<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

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
        ]);

        $file = $request->file('image');
        $path = $file->store('media', 'private'); // storage/app/public/media/...
        $token = Str::random(40);
        $media = Media::create([
            'user_id' => Auth::id(), // nullable kalau public
            'token' => $token,
            'disk' => 'private',
            'path' => $path,
            'original_name' => $file->getClientOriginalName(),
            'mime' => $file->getMimeType(),
            'size' => $file->getSize(),
        ]);

        // penting: balikkan URL agar bisa di-insert ke text/editor
        $url = route('mfile', [
        'token' => $media->token,
        'filename' => basename($media->path),
        ]);

        return response()->json([
            'id'  => $media->id,
            'url' => $url,
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

    public function showPrivate(string $token, string $filename): BinaryFileResponse
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

    // 4) pastikan filename yang di URL "sesuai" (optional tapi bagus)
    // ambil nama file asli dari path DB
    $realName = basename($media->path); // contoh: a1b2c3.webp

    // optional: izinkan URL pakai nama asli, atau nama yang sudah dislug
    if ($filename !== $realName) {
        // kalau mau "toleran", kamu bisa redirect ke URL yang benar:
        // return redirect()->route('media.private.show', ['token'=>$token, 'filename'=>$realName]);
        abort(403);
    }

    // 5) cek file ada (path diambil dari DB, bukan dari URL)
    if (!Storage::disk('private')->exists($media->path)) {
        abort(403);
    }

    // 6) serve file
    return response()->file(
        storage_path('app/private/' . $media->path)
    );
}
}
