<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Filter\AnimeFilter;
use App\Http\Requests\Admin\AnimeRequest;
use App\Http\Requests\Admin\AnimeThumbnailRequest;
use App\Models\Anime;
use App\Models\Genre;
use App\Util\Image\Image;

class AnimeController extends Controller
{
    public function getCropSize()
    {
        return response()->json([
            'width'  => Anime::CROP_DEFAULT[0],
            'height' => Anime::CROP_DEFAULT[1]
        ]);
    }

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

    public function updateThumbnail(AnimeThumbnailRequest $request, Anime $anime)
    {
        $image = new Image(Anime::IMAGE_FOLDER, $request);

        if (!is_null($anime->image)) {
            $image->delete($anime->image);
        }

        $image->crop(Anime::CROP_DEFAULT)
            ->medium(Anime::CROP_MEDIUM)
            ->small(Anime::CROP_SMALL);

        $anime->image = $image->name();
        
        $anime->save();

        return back();
    }

    public function delete(Anime $anime)
    {
        $anime->genres()->detach();

        $anime->delete();

        return back();
    }
}
