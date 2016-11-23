<?php

/**
 * Created by PhpStorm.
 * User: dkhodakovskiy
 * Date: 23.11.16
 * Time: 15:14
 */

class EveHelper
{

    const IMAGE_TYPE_CHARACTER      = 'Character';
    const IMAGE_TYPE_CORPORATION    = 'Corporation';
    const IMAGE_TYPE_ALLIANCE       = 'Alliance';
    const IMAGE_TYPE_TYPE           = 'Type';
    const IMAGE_TYPE_FACTION        = 'Alliance';
    const IMAGE_TYPE_SHIP           = 'Render';
    const IMAGE_TYPE_DRONE          = 'Render';

    public static function image($id, $size, $type = self::IMAGE_TYPE_CHARACTER)
    {
        $ext = ($type == self::IMAGE_TYPE_CHARACTER) ? 'jpg' : 'png';
        return "https://imageserver.eveonline.com/{$type}/{$id}_{$size}.{$ext}";
    }

}
