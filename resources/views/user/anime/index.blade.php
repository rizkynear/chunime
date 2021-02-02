@extends('user.layout.master')

@section('meta')
<meta name="description" content="Detail anime {{ $anime->title }}">
<meta name="keywords" content="{{ $anime->title }}">
@endsection

@section('sub-title', $anime->title)

@section('content')
<!-- Anime Section Begin -->
<section class="anime-details spad pt-3 pt-sm-4">
    <div class="container">
        <div class="anime__details__content">
            <div class="row">
                <div class="col-lg-3">
                    <div class="anime__details__pic set-bg" data-setbg="{{ asset('storage/images/animes/thumbnail/' . $anime->image_thumbnail) }}">
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="anime__details__text">
                        <div class="anime__details__title">
                            <h1>{{ $anime->title }}</h1>
                        </div>
                        {!! $anime->description !!}
                        <div class="anime__details__widget">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <ul class="mb-0">
                                        <li><span>Tipe:</span> {{ $anime->type }}</li>
                                        <li><span>Studio:</span> {{ $anime->studio }}</li>
                                        <li><span>Tanggal Rilis:</span> {{ date('M d, Y', strtotime($anime->release_date)) }}</li>
                                        <li><span>Status:</span> {{ $anime->status }}</li>
                                        <li>
                                            <span>Genre:</span>
                                            @foreach($anime->genres as $genre)
                                                {{ $loop->iteration == 1 ? $genre->name : ', ' . $genre->name }}
                                            @endforeach
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <ul class="mb-0">
                                        <li><span>Total Episode:</span> {{ $anime->status == 'On Going' ? '?' : $anime->total_episode }}</li>
                                        <li><span>Rating:</span> {{ $anime->rating }} / 10</li>
                                        <li><span>Durasi:</span> {{ $anime->duration }} min/ep</li>
                                        <li><span>Quality:</span> {{ $anime->quality }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="anime__episode">
                    <div class="section-title">
                        <h5>Episode List</h5>
                    </div>
                    <div class="episode__list overflow-auto" style="max-height: 400px;">
                        @foreach ($anime->episodes as $episode)
                            @if ($episode->is_published)
                                <div class="episode__item d-flex text-white justify-content-between border-bottom border-white py-3 align-items-center">
                                    <a href="{{ route('user.episode', $episode->slug) }}"> {{ $episode->title }}</a>
                                    <span class="episode_release">{{ date('d-m-Y', strtotime($episode->published_at)) }}</span>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Anime Section End -->
@endsection