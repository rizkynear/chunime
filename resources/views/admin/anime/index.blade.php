@extends('admin.layout.master')

@section('style-lib')
<link rel="stylesheet" href="{{ asset('css/selectric.css') }}">
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
                                        <th>Release Date</th>
                                        <th>Created At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($animes as $anime)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $anime->title }}
                                                <div class="table-links">
                                                    <a href="#">Episodes</a>
                                                    <div class="bullet"></div>
                                                    <a href="{{ route('admin.anime.edit', $anime->slug) }}">Edit</a>
                                                    <div class="bullet"></div>
                                                    <a type="button" class="text-danger btn-delete" data-url="{{ route('admin.anime.delete', $anime->slug) }}">Delete</a>
                                                </div>
                                            </td>
                                            <td>{{ $anime->type }}</td>
                                            <td>{{ $anime->status }}</td>
                                            <td>{{ date('d M Y', strtotime($anime->release_date)) }}</td>
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
@endsection

@section('script-lib')
<script src="{{ asset('js/jquery.selectric.min.js') }}"></script>
@endsection

@section('script')
<script src="{{ asset('js/features-posts.js') }}"></script>

<script>
    $('.btn-detail').on('click', function() {

    });
</script>
@endsection