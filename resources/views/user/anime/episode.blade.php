@extends('user.layout.master')

@section('meta')
<meta name="description" content="{{ $episode->title }} dari anime {{ $episode->anime->title }}">
<meta name="keywords" content="{{ $episode->anime->title }} {{ $episode->title }}">
@endsection

@section('sub-title', $episode->anime->title . ' ' .  $episode->title)

@section('content')
<!-- Anime Section Begin -->
<section class="anime-details spad pt-3 pt-sm-4">
    <div class="container">
        <div class="anime__details__content">
            <div class="row">
                <div class="col-lg-3">
                    <div class="anime__details__pic set-bg" data-setbg="{{ asset('storage/images/animes/thumbnail/' . $episode->anime->image_thumbnail) }}">
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="anime__details__text">
                        <div class="anime__details__title">
                            <h1>{{ $episode->anime->title }} {{ $episode->title }}</h1>
                        </div>
                        {!! $episode->anime->description !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="anime__episode">
                    <div class="section-title">
                        <h5>Download List</h5>
                    </div>
                    <div class="download__list">
                        @foreach($downloads as $quality => $value)
                            <div class="download">
                                <div class="bg-white d-flex justify-content-center">
                                    <b>SoftSub {{ $quality }}p</b>
                                </div>
                                <div class="d-flex flex-wrap justify-content-center py-3">
                                    @foreach($value as $download)
                                        @if ($loop->iteration > 1)
                                            <span class="text-white">|</span>
                                        @endif
                                        <span class="mx-1 mb-1 mb-sm-0 mx-sm-3 text-white"><a href="{{ $download->link }}"> {{ $download->server_name }}</a></span>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Anime Section End -->
@endsection

@section('script')
<script type="text/javascript">
    var ouo_token = 'g3GkyK6o';
    var domains = ['acefile.co', 'drive.google.com', 'solidfiles.com', 'zippyshare.com']; 
</script>
<script src="//cdn.ouo.io/js/full-page-script.js"></script>
@endsection