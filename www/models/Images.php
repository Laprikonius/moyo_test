<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Images extends ActiveRecord
{

    const ARRAY_IMAGES = [
        '1' => '/img/iphone15.png',
        '2' => '/img/macbook.png'
    ];

    public static function tableName()
    {
        return 'images';
    }

    public static function saveImages(
        string $position,
        string $filename,
        string $url)
    {
        $image = new Images();
        $image->position = $position;
        $image->filename = $filename;
        $image->url = $url;
        $image->category_id_image = $category_id_image;
        $product->save();

        return $product;
    }
}