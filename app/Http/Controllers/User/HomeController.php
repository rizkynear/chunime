<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Anime;
use App\Models\Episode;

class HomeController extends Controller
{
    public function index()
    {
        $latestEpisode   = Episode::newest()->take(6)->get();
        $recommendAnimes = Anime::completed()->get()->shuffle()->take(6);
        $bannerAnimes    = Anime::hasEpisode()->get()->shuffle()->take(3);

        return view('user.home.index')->with(compact('latestEpisode', 'recommendAnimes', 'bannerAnimes'));
    }
}
