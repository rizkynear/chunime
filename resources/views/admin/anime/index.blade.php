@extends('admin.layout.master')

@section('style-lib')
<link rel="stylesheet" href="{{ asset('css/selectric.css') }}">
<link rel="stylesheet" href="{{ asset('css/cropper.css') }}">
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Animes</h1>
        <div class="section-header-button">
            <a href="{{ route('admin.anime.create') }}" class="btn btn-primary">Add New</a>
        </div>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active">Animes</div>
        </div>
    </div>
    <div class="section-body">
        <h2 class="section-title">Animes</h2>
        <p class="section-lead">
            You can manage all Animes, such as editing, deleting and more.
        </p>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>All Animes</h4>
                    </div>
                    <div class="card-body">
                        <div class="float-right">
                            <form action="{{ route('admin.anime.index') }}">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request()->get('search') }}">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="clearfix mb-3"></div>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Title</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Published Episode</th>
                                        <th>Created At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($animes as $anime)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $anime->title }}
                                                <div class="table-links">
                                                    <a type="button" class="btn-banner" data-toggle="modal" data-url="{{ route('admin.anime.update.banner', $anime->slug) }}" data-image="{{ $anime->image_banner ? asset('storage/images/animes/banner/' . $anime->image_banner) : '' }}">Banner</a>
                                                    <div class="bullet"></div>
                                                    <a type="button" class="btn-thumbnail" data-toggle="modal" data-url="{{ route('admin.anime.update.thumbnail', $anime->slug) }}" data-image="{{ $anime->image_thumbnail ? asset('storage/images/animes/thumbnail/' . $anime->image_thumbnail) : '' }}">Thumbnail</a>
                                                    <div class="bullet"></div>
                                                    <a href="{{ route('admin.anime.episode.index', $anime->slug) }}">Episodes</a>
                                                    <div class="bullet"></div>
                                                    <a href="{{ route('admin.anime.edit', $anime->slug) }}">Edit</a>
                                                    <div class="bullet"></div>
                                                    <a type="button" class="text-danger btn-delete" data-url="{{ route('admin.anime.delete', $anime->slug) }}">Delete</a>
                                                </div>
                                            </td>
                                            <td>{{ $anime->type }}</td>
                                            <td>{{ $anime->status }}</td>
                                            <td>{{ $anime->published_episode }}</td>
                                            <td>{{ date('d M Y', strtotime($anime->created_at)) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="float-right">
                            {{ $animes->appends(Request::except('page'))->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="modal-thumbnail" tabindex="-1" role="dialog" aria-labelledby="modalThumbnailLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Thumbnail</h5>
                <button type="button" class="close btn-close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ old('url') }}" method="post" id="form-thumbnail" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="modal-body">
                    <div class="form-group">
                        <img class="image-preview" src="{{ old('image_prev') }}" alt="Thumbnail Preview">
                        <input type="hidden" class="x-coordinate" name="x">
                        <input type="hidden" class="y-coordinate" name="y">
                        <input type="hidden" class="width" name="width">
                        <input type="hidden" class="height" name="height">
                    </div>
                    <div class="form-group">
                        <label class="sr-only">Image</label>
                        <input type="file" class="form-control" id="input-image" name="image">
                        @error('image')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="type" value="thumbnail">
                    <input type="hidden" name="url" value="{{ old('url') }}" id="thumbnail-url">
                    <input type="hidden" name="image_prev" value="{{ old('image_prev') }}">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary btn-close">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-banner" tabindex="-1" role="dialog" aria-labelledby="modalBannerLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Banner</h5>
                <button type="button" class="close btn-close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ old('url_banner') }}" method="post" id="form-banner" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="modal-body">
                    <div class="form-group">
                        <img class="image-preview img-fluid w-100" src="{{ old('image_prev_banner') }}" alt="Banner Preview">
                        <input type="hidden" class="x-coordinate" name="x">
                        <input type="hidden" class="y-coordinate" name="y">
                        <input type="hidden" class="width" name="width">
                        <input type="hidden" class="height" name="height">
                    </div>
                    <div class="form-group">
                        <label class="sr-only">Image</label>
                        <input type="file" class="form-control" id="input-image-banner" name="image">
                        @error('image')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="type" value="banner">
                    <input type="hidden" name="url_banner" value="{{ old('url_banner') }}" id="banner-url">
                    <input type="hidden" name="image_prev_banner" value="{{ old('image_prev_banner') }}">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary btn-close">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script-lib')
<script src="{{ asset('js/jquery.selectric.min.js') }}"></script>
<script src="{{ asset('js/cropper.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery-cropper.js') }}" type="text/javascript"></script>
@endsection

@section('script')
@if ($errors->any() && old('type') == 'thumbnail') 
<script>
    $('#modal-thumbnail').modal();
</script>
@elseif ($errors->any() && old('type') == 'banner')
<script>
    $('#modal-banner').modal();
</script>
@endif
<script src="{{ asset('js/features-posts.js') }}"></script>

<script>
    $('#input-image').on('change', function() {
        var parent = $(this).parent().parent().parent();
        var $input = this;

        $.ajax({
            url: "{{ route('admin.anime.crop-size-thumbnail') }}",
            type: 'get',
            success:function(data) {
                imageCropper($input, parent, data.width, data.height);
            }
        });
    });

    $('.btn-thumbnail').on('click', function() {
        let image = $(this).data('image');
        const url = $(this).data('url');

        if (image == '') {
            image = 'https://via.placeholder.com/265x440';
        }

        $('#form-thumbnail').attr('action', url);
        $('#thumbnail-url').val(url);
        $('.image-preview').attr('src', image);
        $('input[name="image_prev"]').val(image);

        $('#modal-thumbnail').modal();
    });

    $('.btn-banner').on('click', function() {
        let image = $(this).data('image');
        const url = $(this).data('url');

        if (image == '') {
            image = 'https://via.placeholder.com/1200x600';
        }

        $('#form-banner').attr('action', url);
        $('#banner-url').val(url);
        $('.image-preview').attr('src', image);
        $('input[name="image_prev_banner"]').val(image);

        $('#modal-banner').modal();
    });

    $('#input-image-banner').on('change', function() {
        var parent = $(this).parent().parent().parent();
        var $input = this;

        $.ajax({
            url: "{{ route('admin.anime.crop-size-banner') }}",
            type: 'get',
            success:function(data) {
                imageCropper($input, parent, data.width, data.height);
            }
        });
    });
</script>
@endsection