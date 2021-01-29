@extends('user.layout.master')

@section('sub-title', 'Download Anime Subtitle Bahasa Indonesia')

@section('content')
<!-- Hero Section Begin -->
<section class="hero pt-3 pt-sm-4">
    <div class="container">
        <div class="hero__slider owl-carousel">
            @foreach ($bannerAnimes as $anime)
            <div class="set-bg" data-setbg="{{ asset('storage/images/animes/banner/' . $anime->image_banner) }}">
                <div class="hero__items custom-min-height-banner bg-dark-low-opacity">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero__text">
                                <div class="label"><a href="{{ route('user.genre', $anime->main_genre_slug) }}">{{ $anime->main_genre_name }}</a></div>
                                <h2><a href="{{ route('user.anime', $anime->slug) }}" class="text-white">{{ $anime->title }}</a></h2>
                                <p style="word-wrap: break-word;">{!! str_limit(strip_tags($anime->description), 70, '...') !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="trending__product mb-0 mb-sm-4">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            <div class="section-title">
                                <h4>Update Terbaru</h4>
                            </div>
                        </div>
                        <!-- <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="btn__all">
                                <a href="#" class="primary-btn">View All <span class="arrow_right"></span></a>
                            </div>
                        </div> -->
                    </div>
                    <div class="row">
                        @foreach($latestEpisode as $episode)
                            <div class="col-lg-4 col-md-6 col-6">
                                <div class="product__item">
                                    <a href="{{ route('user.episode', $episode->slug) }}">
                                        <div class="product__item__pic set-bg" data-setbg="{{ asset('storage/images/animes/thumbnail/' . $episode->anime->image_thumbnail) }}">
                                            <div class="ep">{{ $episode->title }}</div>
                                        </div>
                                    </a>
                                    <div class="product__item__text">
                                        <ul>
                                            @foreach ($episode->anime->genres as $genre)
                                                @if ($loop->iteration < 3)
                                                    <li><a href="{{ route('user.genre', $genre->slug) }}" class="text-white">{{ $genre->name }}</a></li>
                                                @endif
                                            @endforeach
                                        </ul>
                                        <h5 class="anime-name"><a href="{{ route('user.episode', $episode->slug) }}">{{ $episode->anime->title }}</a></h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="popular__product mb-0 mb-sm-4">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            <div class="section-title">
                                <h4>Rekomendasi Anime</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($recommendAnimes as $anime)
                        <div class="col-lg-4 col-md-6 col-6">
                            <div class="product__item">
                                <a href="{{ route('user.anime', $anime->slug) }}">
                                    <div class="product__item__pic set-bg" data-setbg="{{ asset('storage/images/animes/thumbnail/' . $anime->image_thumbnail) }}">
                                        <div class="ep">{{ $anime->published_episode }} Episode</div>
                                    </div>
                                </a>
                                <div class="product__item__text">
                                    <ul>
                                        @foreach($anime->genres as $genre)
                                            @if ($loop->iteration < 3)
                                                <li><a href="{{ route('user.genre', $genre->slug) }}" class="text-white">{{ $genre->name }}</a></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                    <h5 class="anime-name"><a href="{{ route('user.anime', $anime->slug) }}">{{ $anime->title }}</a></h5>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-8">
                <div class="product__sidebar">
                    <div class="product__sidebar__comment">
                        <div class="section-title">
                            <h4>Fanspage</h4>
                        </div>
                        <div class="fb-page" data-href="https://www.facebook.com/chunime" data-tabs="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/chunime" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/chunime">Chunime Indonesia Sub</a></blockquote></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->
@endsection