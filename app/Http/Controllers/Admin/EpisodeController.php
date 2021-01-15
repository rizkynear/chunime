<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EpisodeRequest;
use App\Models\Anime;
use App\Models\Episode;

class EpisodeController extends Controller
{
    public function index(Anime $anime)
    {
        return view('admin.episode.index')->with(compact('anime'));
    }

    public function store(EpisodeRequest $request, Anime $anime)
    {
        $anime->episodes()->create([
            'title' => $request->title
        ]);

        return back();
    }

    public function update(EpisodeRequest $request, Anime $anime, Episode $episode)
    {
        $episode->fill($request->all());

        $episode->save();

        return back();
    }

    public function delete(Anime $anime, Episode $episode)
    {
        $episode->delete();

        return back();
    }
    
    public function publish(Anime $anime, Episode $episode)
    {
        $episode->status       = Episode::PUBLISH;
        $episode->published_at = now();

        $episode->save();

        return back();
    }
}
