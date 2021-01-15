<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GenreRequest;
use App\Models\Genre;
use App\Http\Filter\GenreFilter;

class GenreController extends Controller
{
    public function index(Request $request, GenreFilter $filter)
    {
        $genres = Genre::latest()->paginate(10);

        if ($request->has('search')) {
            $genres = Genre::filter($filter)->latest()->paginate(10);
        }

        return view('admin.genre.index')->with(compact('genres'));
    }

    public function store(GenreRequest $request)
    {
        $genre = new Genre($request->input());

        $genre->save();

        return back();
    }

    public function update(GenreRequest $request, Genre $genre)
    {
        $genre->fill($request->all());

        $genre->save();

        return back();
    }

    public function delete(Genre $genre)
    {
        $genre->delete();

        return back();
    }
}
