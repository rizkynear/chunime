<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Filter\AnimeFilter;
use App\Models\Anime;
use App\Models\Episode;

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

    public function search(Request $request, AnimeFilter $filter)
    {
        $animes = Anime::filter($filter)->latest()->paginate(10);

        return view('user.anime.search')->with(compact('animes'));
    }

    public function latest()
    {
        $episodes = Episode::newest()->paginate(12);

        return view('user.anime.latest')->with(compact('episodes'));
    }

    public function ongoing()
    {
        $animes = Anime::ongoing()->paginate(12);

        return view('user.anime.ongoing')->with(compact('animes'));
    }
}
