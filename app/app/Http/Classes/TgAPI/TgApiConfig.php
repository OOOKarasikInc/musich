<?php

namespace App\Http\Classes\TgAPI;

class TgApiConfig
{
    public static function getToken()
    {
        return getenv('TG_API_TOKEN');
    }

    public static function getChannelId()
    {
        return '-100' . getenv('TG_CHANNEL_ID');
    }

    public static function getHost()
    {
        return getenv('APP_URL_PROD');
    }
}
