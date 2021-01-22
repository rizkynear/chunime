@extends('user.layout.master')

@section('content')
<!-- Anime Section Begin -->
<section class="anime-details spad pt-3 pt-sm-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5">
                <div class="genres__list">
                    <div class="section-title">
                        <h4>Genre List</h4>
                    </div>
                    <div class="genres">
                        <div class="row">
                            @foreach ($genres as $genre)
                                <div class="col-6 col-sm-3 mb-3">
                                    <a href="{{ route('user.genre', $genre->slug) }}" class="btn btn-light d-block">{{ $genre->name }}</a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-8">
                <div class="product__sidebar">
                    <div class="product__sidebar__comment">
                        <div class="section-title">
                            <h4>Fanspage</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Anime Section End -->
@endsection