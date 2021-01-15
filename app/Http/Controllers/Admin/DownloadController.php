<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DownloadRequest;
use App\Models\Anime;
use App\Models\Download;
use App\Models\Episode;

class DownloadController extends Controller
{
    public function index(Anime $anime, Episode $episode)
    {
        return view('admin.download.index')->with(compact('anime', 'episode'));
    }

    public function store(DownloadRequest $request, Anime $anime, Episode $episode)
    {
        $download = new Download($request->input());

        $download->episode_id = $episode->id;

        $download->save();

        return back();
    }

    public function update(DownloadRequest $request, Anime $anime, Episode $episode, Download $download)
    {
        $download->fill($request->input());

        $download->save();

        return back();
    }

    public function delete(Anime $anime, Episode $episode, Download $download)
    {
        $download->delete();

        return back();
    }
}