<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Anime;

class AnimeController extends Controller
{
    public function index(Anime $anime)
    {
        return view('user.anime.index')->with(compact('anime'));
    }

    public function list()
    {
        $animes = Anime::hasEpisode()->get();

        $animes = $animes->groupBy(function($anime, $key) {
            return $anime->title[0];
        })->sortBy(function($anime, $key) {
            return $key;
        });

        return view('user.anime.list')->with(compact('animes'));
    }
}
