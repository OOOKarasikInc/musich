<?php

namespace App\Http\Controllers;

use App\Http\Classes\Audio;
use App\Http\Classes\TgAPI\TgApi;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public TgApi $tgApi;
    public function __construct(TgApi $tgApi)
    {
        $this->tgApi = $tgApi;
    }

    public function showPage()
    {
        return view('test');
    }

    public function uploadTrack(Request $req)
    {
        $file = $req->file('track');
        $response = $this->tgApi->makeRequest('sendAudio', $file);
        $fileId = $this->tgApi->getFileId($response);
        $author = Audio::getTrackAuthor($file);
        $name = Audio::getTrackName($file);
        Audio::saveInDB($fileId, $author, $name);

        return redirect(route('index'))->send();
    }
}
