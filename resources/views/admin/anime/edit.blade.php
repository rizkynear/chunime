@extends('admin.layout.master')

@section('style-lib')
<link rel="stylesheet" href="{{ asset('css/selectric.css') }}">
<link rel="stylesheet" href="{{ asset('css/summernote-bs4.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/bootstrap-tagsinput.css') }}">
<link rel="stylesheet" href="{{ asset('css/daterangepicker.css') }}">
<link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('admin.anime.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Edit Anime</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.anime.index') }}">Animes</a></div>
            <div class="breadcrumb-item">Edit Anime</div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Edit Anime</h2>
        <p class="section-lead">
            On this page you can edit anime and fill in all fields.
        </p>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Anime</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.anime.update', $anime->slug) }}" method="post">
                            @csrf
                            @method('PATCH')
                            
                            @include('admin.anime.shared');

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Genres</label>
                                <div class="col-sm-12 col-md-7">
                                    <select class="form-control select2" multiple="" name="genres[]">
                                        @php
                                            $genreIds = [];
                                        @endphp
                                        @foreach($anime->genres as $animeGenre)
                                            @php
                                                $genreIds[] = $animeGenre->id;
                                            @endphp
                                        @endforeach
                                        @foreach($genres as $genre)
                                                <option value="{{ $genre->id }}" {{ in_array($genre->id, $genreIds) ? 'selected' : '' }}>{{ $genre->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('genres')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button class="btn btn-primary">Update Anime</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script-lib')
<script src="{{ asset('js/jquery.selectric.min.js') }}"></script>
<script src="{{ asset('js/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-tagsinput.js') }}"></script>
<script src="{{ asset('js/daterangepicker.js') }}"></script>
<script src="{{ asset('js/select2.min.js') }}"></script>
@endsection

@section('script')
<script src="{{ asset('js/features-posts.js') }}"></script>
@endsection