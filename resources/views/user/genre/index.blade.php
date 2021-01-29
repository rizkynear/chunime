@extends('user.layout.master')

@section('meta')
<meta name="description" content="Daftar anime yang termasuk dalam genre {{ $genre->name }}">
<meta name="keywords" content="Genre {{ $genre->name }}, {{ $genre->name }}">
@endsection

@section('sub-title', 'Genre ' . $genre->name)

@section('content')
<!-- Product Section Begin -->
<section class="product-page spad pt-3 pt-sm-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5">
                <div class="product__page__content">
                    <div class="product__page__title">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-6">
                                <div class="section-title">
                                    <h1>{{ $genre->name }}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($animes as $anime)
                            <div class="col-lg-4 col-md-6 col-6">
                                <div class="product__item">
                                    <a href="{{ route('user.anime', $anime->slug) }}">
                                        <div class="product__item__pic set-bg" data-setbg="{{ asset('storage/images/animes/thumbnail/' . $anime->image_thumbnail) }}">
                                            <div class="ep">{{ $anime->published_episode }} Episode</div>
                                            <div class="comment">{{ $anime->status }}</div>
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
