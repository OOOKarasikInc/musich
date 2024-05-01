<?php

namespace App\Http\Controllers;

use App\Http\Classes\Audio;
use App\Http\Classes\TgAPI\TgApi;
use App\Http\Classes\TgAPI\TgApiConfig;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    public TgApi $tgApi;
    public function __construct(TgApi $tgApi)
    {
        $this->tgApi = $tgApi;
    }
    public function showPage(Request $req)
    {
        $data = Audio::getAllTracks($req->get('offset') ?? null);

        foreach ($data as $track)
        {
            $track['path'] = sprintf('https://api.telegram.org/file/bot%s/%s', TgApiConfig::getToken(), $this->getTrack($track->tg_file_id)['file_path']);
        }

        return view('testMusicShow', compact('data'));
    }

    private function getTrack(string $fileId)
    {
        return $this->tgApi->makeRequest('getFile', null, ['file_id' => $fileId])['result'];
    }
}
