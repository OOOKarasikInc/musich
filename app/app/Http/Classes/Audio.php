<?php

namespace App\Http\Classes;

use App\Http\Classes\TgAPI\TgApiConfig;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class Audio
{

    private const TMP_FILE_PATH = 'tmpFiles';
    private const PUBLIC_PATH = 'public';

    public static function saveFile(UploadedFile $file)
    {
        $savedFile = $file->move(self::TMP_FILE_PATH, $file->getClientOriginalName());
        return TgApiConfig::getHost() . '/' . self::PUBLIC_PATH . '/' . $savedFile->getPath() . '/' . $savedFile->getFilename();
    }

    public static function deleteFile(string $name)
    {
        unlink(self::TMP_FILE_PATH . '/' .$name);
    }

    public static function getTrackAuthor(UploadedFile $file)
    {
        return explode(' - ', $file->getClientOriginalName())[0];
    }

    public static function getTrackName(UploadedFile $file)
    {
        return explode('.', explode(' - ', $file->getClientOriginalName())[1])[0];
    }

    public static function saveInDB(string $fileId, string $author, string $name)
    {
        \App\Models\Audio::saveAudio($fileId, $author, $name);
    }

    public static function getAllTracks(int $offset = null)
    {
        return \App\Models\Audio::getAllTracks($offset);
    }
    public static function getFromDB()
    {

    }
}
