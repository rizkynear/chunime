@extends('user.layout.master')

@section('content')
<!-- Anime Section Begin -->
<section class="anime-details spad pt-3 pt-sm-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5">
                <div class="row">
                    <div class="col-12">
                        <div class="animes__list">
                            <div class="section-title">
                                <h4>Anime List</h4>
                            </div>
                            <div class="anime__details__episodes d-flex justify-content-md-between flex-wrap">
                                <a href="#a" class="mr-1 mr-md-0">A</a>
                                <a href="#b" class="mr-1 mr-md-0">B</a>
                                <a href="#c" class="mr-1 mr-md-0">C</a>
                                <a href="#d" class="mr-1 mr-md-0">D</a>
                                <a href="#e" class="mr-1 mr-md-0">E</a>
                                <a href="#f" class="mr-1 mr-md-0">F</a>
                                <a href="#g" class="mr-1 mr-md-0">G</a>
                                <a href="#h" class="mr-1 mr-md-0">H</a>
                                <a href="#i" class="mr-1 mr-md-0">I</a>
                                <a href="#j" class="mr-1 mr-md-0">J</a>
                                <a href="#k" class="mr-1 mr-md-0">K</a>
                                <a href="#l" class="mr-1 mr-md-0">L</a>
                                <a href="#m" class="mr-1 mr-md-0">M</a>
                                <a href="#n" class="mr-1 mr-md-0">N</a>
                                <a href="#o" class="mr-1 mr-md-0">O</a>
                                <a href="#p" class="mr-1 mr-md-0">P</a>
                                <a href="#q" class="mr-1 mr-md-0">Q</a>
                                <a href="#r" class="mr-1 mr-md-0">R</a>
                                <a href="#s" class="mr-1 mr-md-0">S</a>
                                <a href="#t" class="mr-1 mr-md-0">T</a>
                                <a href="#u" class="mr-1 mr-md-0">U</a>
                                <a href="#v" class="mr-1 mr-md-0">V</a>
                                <a href="#w" class="mr-1 mr-md-0">W</a>
                                <a href="#x" class="mr-1 mr-md-0">X</a>
                                <a href="#y" class="mr-1 mr-md-0">Y</a>
                                <a href="#z" class="mr-1 mr-md-0">Z</a>
                            </div>
                            @foreach($animes as $key => $value)
                                <div class="anime_list mb-4" id="{{ strtolower($key) }}">
                                    <h5 class="text-white mb-1">{{ $key }}</h5>
                                    <div class="separator mb-2"></div>
                                    <div class="row">
                                        @foreach ($value as $anime)
                                            <div class="col-md-6 mb-1">
                                                <a href="{{ route('user.anime', $anime->slug) }}"><span class="text-white d-flex align-items-center"><i class="fa fa-square mr-2" style="font-size: 8px;"></i> {{ $anime->title }}</span></a>
                                            </div>
                                        @endforeach
                                    </div>
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
                        <div class="fb-page" data-href="https://www.facebook.com/chunime" data-tabs="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/chunime" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/chunime">Chunime Indonesia Sub</a></blockquote></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Anime Section End -->
@endsection