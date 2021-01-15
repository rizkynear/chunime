@extends('admin.layout.master')

@section('style-lib')
<link rel="stylesheet" href="{{ asset('css/selectric.css') }}">
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('admin.anime.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>{{ $anime->title }}</h1>
        <div class="section-header-button">
            <button class="btn btn-primary" data-toggle="modal" data-target="#modal-add">Add New Episode</button>
        </div>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('admin.anime.index') }}">Animes</a></div>
            <div class="breadcrumb-item">{{ $anime->title }}</div>
        </div>
    </div>
    <div class="section-body">
        <h2 class="section-title">Episodes</h2>
        <p class="section-lead">
            You can manage all Episodes, such as editing, deleting and more.
        </p>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>All Episodes</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Slug</th>
                                        <th>Published At</th>
                                        <th>Created at</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($anime->episodes as $episode)
                                        <tr>
                                            <td>{{ $episode->title }}
                                                <div class="table-links">
                                                    @if (!$episode->is_published)
                                                        <a type="button" class="btn-publish" data-url="{{ route('admin.anime.episode.publish', [$anime->slug, $episode->slug]) }}">Publish</a>
                                                        <div class="bullet"></div>
                                                    @endif
                                                    <a href="{{ route('admin.anime.episode.download.index', [$anime->slug, $episode->slug]) }}">Downloads</a>
                                                    <div class="bullet"></div>
                                                    <a type="button" data-toggle="modal" class="btn-edit" data-params="{{ $episode }}" data-url="{{ route('admin.anime.episode.update', [$anime->slug, $episode->slug]) }}">Edit</a>
                                                    <div class="bullet"></div>
                                                    <a type="button" class="text-danger btn-delete" data-url="{{ route('admin.anime.episode.delete', [$anime->slug, $episode->slug]) }}">Delete</a>
                                                </div>
                                            </td>
                                            <td>{{ $episode->slug }}</td>
                                            <td>{{ $episode->published_at ? date('d M Y H:i:s', strtotime($episode->published_at)) : '-' }}</td>
                                            <td>{{ date('d M Y', strtotime($episode->created_at)) }}</td>
                                            <td>{{ $episode->statusName }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="modalAddLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Episode</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.anime.episode.store', $anime->slug) }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" value="{{ old('form_type') == 'store' ? old('title') : '' }}">
                        @if (old('form_type') == 'store')
                            @error('title')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="form_type" value="store">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Genre</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ old('url') }}" method="post" id="form-edit">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" value="{{ old('form_type') == 'edit' ? old('title') : '' }}">
                        @if (old('form_type') == 'edit')
                            @error('title')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="url" value="{{ old('url') }}">
                    <input type="hidden" name="form_type" value="edit">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-publish" tabindex="-1" role="dialog" aria-labelledby="modalPublishLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Publish Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post" id="form-publish">
                @csrf
                <div class="modal-body">
                    <p>
                        Please make sure the download link is available before publishing <br>
                        Do you want to continue?
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Yes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script-lib')
<script src="{{ asset('js/jquery.selectric.min.js') }}"></script>
@endsection

@section('script')
@if ($errors->any() && old('form_type') == 'store') 
<script>
    $('#modal-add').modal();
</script>
@elseif ($errors->any() && old('form_type') == 'edit')
<script>
    $('#modal-edit').modal();
</script>
@endif
<script src="{{ asset('js/features-posts.js') }}"></script>
<script>
    $('.btn-edit').on('click', function() {
        const data = $(this).data('params');
        const url  = $(this).data('url');

        $('#form-edit').attr('action', url);
        $('#form-edit input[name="title"]').val(data.title);
        $('#form-edit input[name="url"]').val(url);

        $('#modal-edit').modal();
    })

    $('.btn-publish').on('click', function() {
        const url  = $(this).data('url');

        $('#form-publish').attr('action', url);

        $('#modal-publish').modal();
    })
</script>
@endsection