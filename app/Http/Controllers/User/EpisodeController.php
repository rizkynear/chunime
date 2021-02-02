<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Filter\StreamFilter;
use App\Models\Episode;

class EpisodeController extends Controller
{
    public function index(Request $request, Episode $episode, StreamFilter $filter)
    {
        $downloads = $episode->downloads->groupBy(function($download, $key) {
            return $download->quality;
        })->sortBy(function($download, $key) {
            return $key;
        });

        $episodeList = $episode->anime->episodes->sortBy(function($anime, $key) {
            return $anime->title;
        });

        $stream = $episode->streams()->default()->first();

        if ($request->has('stream') && ($request->stream == '360' || $request->stream == '480')) {
            $stream = $episode->streams()->filter($filter)->first();
        }

        $episode->load('anime');

        return view('user.anime.episode')->with(compact('episode', 'downloads', 'stream', 'episodeList'));
    }
}
