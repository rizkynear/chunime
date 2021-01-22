<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Genre;

class GenreController extends Controller
{
   public function index(Genre $genre)
   {
      $animes = $genre->animes()->paginate(10);

      return view('user.genre.index')->with(compact('genre', 'animes'));
   }

   public function list()
   {
        $genres = Genre::orderBy('name')->get();

        return view('user.genre.list')->with(compact('genres'));
   }
}
