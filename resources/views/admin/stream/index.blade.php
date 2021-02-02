@extends('admin.layout.master')

@section('style-lib')
<link rel="stylesheet" href="{{ asset('css/selectric.css') }}">
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('admin.anime.episode.index', $anime->slug) }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>{{ $anime->title }} {{ $episode->title }}</h1>
        <div class="section-header-button">
            <button class="btn btn-primary" data-toggle="modal" data-target="#modal-add">Add New Stream</button>
        </div>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('admin.anime.index') }}">Animes</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.anime.episode.index', $anime->slug) }}">{{ $anime->title }}</a></div>
            <div class="breadcrumb-item">Streams</div>
        </div>
    </div>
    <div class="section-body">
        <h2 class="section-title">Streams</h2>
        <p class="section-lead">
            You can manage all Streams, such as editing, deleting and more.
        </p>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>All Streams</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Server Name</th>
                                        <th>Quality</th>
                                        <th>Link</th>
                                        <th>Created at</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($episode->streams as $stream)
                                        <tr>
                                            <td>{{ $stream->server_name }}
                                                <div class="table-links">
                                                    <a type="button" data-toggle="modal" class="btn-edit" data-params="{{ $stream }}" data-url="{{ route('admin.anime.episode.stream.update', [$anime->slug, $episode->slug, $stream->id]) }}">Edit</a>
                                                    <div class="bullet"></div>
                                                    <a type="button" class="text-danger btn-delete" data-url="{{ route('admin.anime.episode.stream.delete', [$anime->slug, $episode->slug, $stream->id]) }}">Delete</a>
                                                </div>
                                            </td>
                                            <td>{{ $stream->quality }}</td>
                                            <td>{{ $stream->link }}</td>
                                            <td>{{ date('d M Y', strtotime($stream->created_at)) }}</td>
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
                <h5 class="modal-title">Add New Stream</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.anime.episode.stream.store', [$anime->slug, $episode->slug]) }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Server Name</label>
                        <input type="text" class="form-control" name="server_name" value="{{ old('form_type') == 'store' ? old('server_name') : '' }}">
                        @if (old('form_type') == 'store')
                            @error('server_name')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Link</label>
                        <input type="text" class="form-control" name="link" value="{{ old('form_type') == 'store' ? old('link') : '' }}">
                        @if (old('form_type') == 'store')
                            @error('link')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Quality</label>
                        <select class="form-control selectric" name="quality">
                            <option value="360" {{ old('quality') == '360' && old('form_type') == 'store' ? 'selected' : '' }}>360</option>
                            <option value="480" {{ old('quality') == '480' && old('form_type') == 'store' ? 'selected' : '' }}>480</option>
                            <option value="720" {{ old('quality') == '720' && old('form_type') == 'store' ? 'selected' : '' }}>720</option>
                            <option value="1080" {{ old('quality') == '1080' && old('form_type') == 'store' ? 'selected' : '' }}>1080</option>
                        </select>
                        @if (old('form_type') == 'store')
                            @error('quality')
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
                <h5 class="modal-title">Edit Stream</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ old('url') }}" method="post" id="form-edit">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <div class="form-group">
                        <label>Server Name</label>
                        <input type="text" class="form-control" name="server_name" value="{{ old('form_type') == 'edit' ? old('server_name') : '' }}">
                        @if (old('form_type') == 'edit')
                            @error('server_name')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Link</label>
                        <input type="text" class="form-control" name="link" value="{{ old('form_type') == 'edit' ? old('link') : '' }}">
                        @if (old('form_type') == 'edit')
                            @error('link')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Quality</label>
                        <select class="form-control selectric" name="quality">
                            <option value="360" {{ old('quality') == '360' && old('form_type') == 'edit' ? 'selected' : '' }}>360</option>
                            <option value="480" {{ old('quality') == '480' && old('form_type') == 'edit' ? 'selected' : '' }}>480</option>
                            <option value="720" {{ old('quality') == '720' && old('form_type') == 'edit' ? 'selected' : '' }}>720</option>
                            <option value="1080" {{ old('quality') == '1080' && old('form_type') == 'edit' ? 'selected' : '' }}>1080</option>
                        </select>
                        @if (old('form_type') == 'edit')
                            @error('quality')
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
        $('#form-edit input[name="server_name"]').val(data.server_name);
        $('#form-edit input[name="link"]').val(data.link);
        $('#form-edit select[name="quality"]').val(data.quality).selectric('refresh');
        $('#form-edit input[name="url"]').val(url);

        $('#modal-edit').modal();
    })
</script>
@endsection