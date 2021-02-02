<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StreamRequest;
use App\Models\Anime;
use App\Models\Episode;
use App\Models\Stream;

class StreamController extends Controller
{
    public function index(Anime $anime, Episode $episode)
    {
        return view('admin.stream.index')->with(compact('anime', 'episode'));
    }

    public function store(StreamRequest $request, Anime $anime, Episode $episode)
    {
        $stream = new Stream($request->input());

        $stream->episode_id = $episode->id;

        $stream->save();

        return back();
    }

    public function update(StreamRequest $request, Anime $anime, Episode $episode, Stream $stream)
    {
        $stream->fill($request->input());

        $stream->save();

        return back();
    }

    public function delete(Anime $anime, Episode $episode, Stream $stream)
    {
        $stream->delete();

        return back();
    }
}
