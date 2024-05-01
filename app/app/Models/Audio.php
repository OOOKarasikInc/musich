<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    use HasFactory;

    private const LIMIT = 50;
    private const DEFAULT_OFFSET = 0;
    protected $guarded = [];

    public static function saveAudio(string $fileId, string $author, string $name)
    {
        self::create([
            'tg_file_id' => $fileId,
            'author' => $author,
            'name' => $name
        ]);
    }

    public static function getAllTracks(int|null $offset)
    {
        $result = self::limit(self::LIMIT)->skip($offset === null ? self::DEFAULT_OFFSET : $offset)->take(self::LIMIT)->get();

        return $result;
    }
}
