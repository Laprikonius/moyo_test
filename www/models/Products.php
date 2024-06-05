<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use app\models\Images;

class Products extends ActiveRecord
{

    const NUMBER_ITEMS = 100;

    const NUMBER_IN_MAIN_PAGE = 6;

    public static function tableName()
    {
        return 'products';
    }

    public static function saveProduct(
        string $title,
        string $description,
        int $price,
        int $price_discount,
        int $quantity,
        $created_at = '',
        $updated_at = '',
        string $image)
    {
        $product = new Products();
        $product->title = $title;
        $product->description = $description;
        $product->price = $price;
        $product->price_discount = $price_discount;
        $product->quantity = $quantity;
        $product->created_at = $created_at;
        $product->updated_at = $updated_at;
        $product->image = $image;
        $product->save();

        return $product;
    }

}