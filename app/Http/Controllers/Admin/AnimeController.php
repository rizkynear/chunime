<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Filter\AnimeFilter;
use App\Http\Requests\Admin\AnimeRequest;
use App\Models\Anime;
use App\Models\Genre;

class AnimeController extends Controller
{
    public function index(Request $request, AnimeFilter $filter)
    {
        $animes = Anime::latest()->paginate(10);

        if ($request->has('search')) {
            $animes = Anime::filter($filter)->latest()->paginate(10);
        }

        return view('admin.anime.index')->with(compact('animes'));
    }

    public function create()
    {
        $anime  = new Anime();
        $genres = Genre::all();

        return view('admin.anime.create')->with(compact('genres', 'anime'));
    }

    public function store(AnimeRequest $request)
    {
        $anime = new Anime($request->input());

        $anime->save();

        $anime->genres()->attach($request->genres);

        return redirect(route('admin.anime.index'));
    }

    public function edit(Anime $anime)
    {
        $genres = Genre::all();

        return view('admin.anime.edit')->with(compact('anime', 'genres'));
    }

    public function update(AnimeRequest $request, Anime $anime)
    {
        $anime->fill($request->all());

        $anime->save();

        $anime->genres()->sync($request->genres);

        return redirect(route('admin.anime.index'));
    }

    public function delete(Anime $anime)
    {
        $anime->genres()->detach();

        $anime->delete();

        return back();
    }
}
