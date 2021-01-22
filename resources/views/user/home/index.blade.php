@extends('user.layout.master')

@section('content')
<!-- Hero Section Begin -->
<section class="hero pt-3 pt-sm-5">
    <div class="container">
        <div class="hero__slider owl-carousel">
            @foreach ($bannerAnimes as $anime)
                <div class="hero__items set-bg" data-setbg="{{ asset('storage/images/animes/' . $anime->image) }}" style="min-height: 350px;">
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
                                        <div class="product__item__pic set-bg" data-setbg="{{ asset('storage/images/animes/medium/' . $episode->anime->image) }}">
                                            <div class="ep">{{ $episode->title }}</div>
                                            <!-- <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                            <div class="view"><i class="fa fa-eye"></i> 9141</div> -->
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
                                    <div class="product__item__pic set-bg" data-setbg="{{ asset('storage/images/animes/medium/' . $anime->image) }}">
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
                    <!-- <div class="product__sidebar__view">
                        <div class="section-title">
                            <h5>Top Views</h5>
                        </div>
                        <ul class="filter__controls">
                            <li class="active" data-filter="*">Day</li>
                            <li data-filter=".week">Week</li>
                            <li data-filter=".month">Month</li>
                            <li data-filter=".years">Years</li>
                        </ul>
                        <div class="filter__gallery">
                            <div class="product__sidebar__view__item set-bg mix day years"
                                data-setbg="img/sidebar/tv-1.jpg">
                                <div class="ep">18 / ?</div>
                                <div class="view"><i class="fa fa-eye"></i> 9141</div>
                                <h5><a href="#">Boruto: Naruto next generations</a></h5>
                            </div>
                            <div class="product__sidebar__view__item set-bg mix month week"
                                data-setbg="img/sidebar/tv-2.jpg">
                                <div class="ep">18 / ?</div>
                                <div class="view"><i class="fa fa-eye"></i> 9141</div>
                                <h5><a href="#">The Seven Deadly Sins: Wrath of the Gods</a></h5>
                            </div>
                            <div class="product__sidebar__view__item set-bg mix week years"
                                data-setbg="img/sidebar/tv-3.jpg">
                                <div class="ep">18 / ?</div>
                                <div class="view"><i class="fa fa-eye"></i> 9141</div>
                                <h5><a href="#">Sword art online alicization war of underworld</a></h5>
                            </div>
                            <div class="product__sidebar__view__item set-bg mix years month"
                                data-setbg="img/sidebar/tv-4.jpg">
                                <div class="ep">18 / ?</div>
                                <div class="view"><i class="fa fa-eye"></i> 9141</div>
                                <h5><a href="#">Fate/stay night: Heaven's Feel I. presage flower</a></h5>
                            </div>
                            <div class="product__sidebar__view__item set-bg mix day"
                                data-setbg="img/sidebar/tv-5.jpg">
                                <div class="ep">18 / ?</div>
                                <div class="view"><i class="fa fa-eye"></i> 9141</div>
                                <h5><a href="#">Fate stay night unlimited blade works</a></h5>
                            </div>
                        </div>
                    </div> -->
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
<!-- Product Section End -->
@endsection