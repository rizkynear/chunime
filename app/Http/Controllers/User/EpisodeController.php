<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Episode;

class EpisodeController extends Controller
{
    public function index(Episode $episode)
    {
        $downloads = $episode->downloads->groupBy(function($download, $key) {
            return $download->quality;
        })->sortBy(function($download, $key) {
            return $key;
        });

        $episode->load('anime');

        return view('user.anime.episode')->with(compact('episode', 'downloads'));
    }
}
