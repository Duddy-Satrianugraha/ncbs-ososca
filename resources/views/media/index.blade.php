@extends('layouts.app')

@section('css')

@endsection

@section('breadcrumb')
   <!-- START BREADCRUMB -->
   <ul class="breadcrumb">
    <li ><a href="{{ route('dashbord')}}">Dashboard</a></li>
    \
        <li class="active">Media</li>
</ul>
<!-- END BREADCRUMB -->
@endsection
@section('page-title')
<div class="page-title">
    <h2><span class="fa fa-arrow-circle-o-left"></span> Media</h2>
</div>
@endsection
@section('content')

<!-- START WIDGETS -->

<div class="container">

    <h3 class="mb-3">Media Gallery</h3>

    {{-- upload manual --}}
    <form action="{{ route('admin.media.upload') }}" method="POST" enctype="multipart/form-data" class="mb-4">
        @csrf
        <div class="input-group">
            <input type="file" name="image" class="form-control" accept="image/*" required>
            <button class="btn btn-primary">Upload</button>
        </div>
        @error('image')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </form>

    {{-- grid --}}
    <div class="row">
        @forelse ($q as $media)
            <div class="col-md-3 col-sm-4 col-6 mb-4">
                <div class="card h-100">
                     <img src="{{ $media->display_url }}"
                         alt="{{ $media->original_name }}"
                         class="card-img-top"
                         style="height:160px;object-fit:cover;cursor:pointer"
                         onclick="insertImage('{{ $media->display_url }}')">

                    <div class="card-body p-2 text-center">
                        <button class="btn btn-sm btn-outline-secondary w-100 mb-1"
                            onclick="copyUrl('{{ route('mfile', [$media->token, $media->filename]) }}')">
                            Copy URL
                        </button>


                        <form action="{{ route('admin.media.destroy', $media) }}"
                              method="POST"
                              onsubmit="return confirm('Hapus gambar ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger w-100">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p>Tidak ada media.</p>
        @endforelse
    </div>

    {{ $q->links() }}
</div>



<!-- END WIDGETS -->

@endsection

@section('javascript')
<script>
function copyUrl(url) {
    navigator.clipboard.writeText(url);
    alert('URL disalin');
}
</script>
@endsection
