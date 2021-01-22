@extends('user.layout.master')

@section('content')
<!-- Product Section Begin -->
<section class="product-page spad pt-4 pt-sm-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="product__page__content">
                    <div class="product__page__title">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-6">
                                <div class="section-title">
                                    <h4>{{ $genre->name }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($animes as $anime)
                            <div class="col-lg-4 col-md-6 col-6">
                                <div class="product__item">
                                    <a href="{{ route('user.anime', $anime->slug) }}">
                                        <div class="product__item__pic set-bg" data-setbg="{{ asset('storage/images/animes/' . $anime->image) }}">
                                            <div class="ep">{{ $anime->published_episode }} Episode</div>
                                        </div>
                                    </a>
                                    <div class="product__item__text">
                                        <ul>
                                            @foreach($anime->genres as $genre)
                                                @if ($loop->iteration < 3)
                                                    <li><a href="{{ route('user.genre', $genre->slug) }}" class="text-white"> {{ $genre->name }}</a></li>
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
                <div class="pt-3">
                    {{ $animes->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->
@endsection