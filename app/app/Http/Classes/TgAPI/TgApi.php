<?php

namespace App\Http\Classes\TgAPI;

use App\Http\Classes\Audio;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class TgApi
{
    private const TG_API_METHODS = [
        'getFile' => 'getFile',
        'sendAudio' => 'sendAudio',

    ];
    private const TG_API_BASE_URL = 'https://api.telegram.org';
    public function makeRequest(string $method, UploadedFile $file = null, array $data = null): array
    {
        $query = Http::withOptions(['verify' => false]);
        switch ($method) {
            case 'getFile':
                $response = $query->get($this->prepareUrl($method), $this->prepareBody($method, null, $data));
                break;
            case 'sendAudio':
                $response = $query->post($this->prepareUrl($method), $this->prepareBody($method, $file));
                //Audio::deleteFile($file->getClientOriginalName());
                break;
        }

        return $response->json();
    }

    public function prepareBody(string $method, UploadedFile $file = null, array $data = null)
    {
        switch ($method) {
            case 'getFile':
                $result = [
                    'file_id' => $data['file_id'],
                ];
                break;
            case 'sendAudio':
                $result = [
                    'chat_id' => TgApiConfig::getChannelId(),
                    'audio' => $this->prepareFile($file),
                ];
                break;
        }

        return $result;
    }
    private function prepareUrl(string $method)
    {
        return  sprintf('%s/bot%s/%s', self::TG_API_BASE_URL, TgApiConfig::getToken(), $this->getMethod($method));
    }

    public function prepareFile(UploadedFile $file)
    {
        $result = Audio::saveFile($file);
        return $result;
    }
    private function getMethod(string $method)
    {
        return self::TG_API_METHODS[$method];
    }
    public function getFileId(array $response)
    {
        var_dump($response);
        dd();
        return $response['result']['audio']['file_id'];
    }
}
