<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\PblKeg;
use App\Models\Otemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $q = Media::query()
            ->when(Auth::check(), fn($qq) => $qq->where('user_id', Auth::id()))
            ->latest()
            ->paginate(24);

        return view('media.index', compact('q'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png,webp,gif', 'max:4096'],
            'paket_id' => 'required|integer',
            'order' => 'required|integer',
            'tipe' => 'required|string',

        ]);
         if ($request->tipe == 'pbl') {
            $paketSoal = PblKeg::findOrFail($request->paket_id);
            $title = $paketSoal->name;
        } else {
            $paketSoal = Otemplate::findOrFail($request->paket_id);
            $title = $paketSoal->nama_template;
        }
         // sanitasi nama folder
        $folderName = Str::slug($title) . '-' . $paketSoal->id;

        $path = $request->file('image')
            ->store("media/{$folderName}", 'private');

        $token = Str::random(40);
        $file = $request->file('image');

        $media = Media::create([
            'paket_id'       => $paketSoal->id,
            'order'          => $request->order,
            'tipe'           => $request->tipe,
            'token'          => $token,
            'disk'           => 'private',
            'path'           => $path,
            'original_name'  => $file->getClientOriginalName(),
            'mime'           => $file->getMimeType(),
            'size'           => $file->getSize(),
        ]);


        // penting: balikkan URL agar bisa di-insert ke text/editor


        return response()->json([
            'id'  => $media->id,
          'url' => '/f/'.$media->token,
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Media $media)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Media $media)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Media $media)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Media $media)
    {
          if (Storage::disk($media->disk)->exists($media->path)) {
            Storage::disk($media->disk)->delete($media->path);
        }

        $media->delete();

        return back()->with('success', 'Gambar dihapus.');
    }

    public function showPrivate(string $token)
{
    // 1) validasi token (40 hex, mis: sha1)
   if (!ctype_alnum($token) || strlen($token) !== 40) {
    abort(404);
}

    // 2) cari media by token
    $media = Media::where('token', $token)->first();
    if (!$media) {
        abort(403);
    }

    // 3) pastikan ini memang file private
    if ($media->disk !== 'private') {
        abort(403);
    }

    // 5) cek file ada (path diambil dari DB, bukan dari URL)
    if (!Storage::disk('private')->exists($media->path)) {
        abort(403);
    }

        abort_unless(Storage::disk($media->disk)->exists($media->path), 404);

        $stream = Storage::disk($media->disk)->readStream($media->path);

        return response()->stream(function () use ($stream) {
            fpassthru($stream);
        }, 200, [
            'Content-Type'        => $media->mime,
            'Content-Disposition' => 'inline; filename="'.$media->original_name.'"',
            'Cache-Control'       => 'private, max-age=86400',
        ]);
}
}
