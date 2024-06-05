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
        string $image,
        int $category_id,
        string $name,
        int $inStock,
        int $inEnding)
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
        $product->category_id = $category_id;
        $product->name = $name;
        $product->inStock = $inStock;
        $product->inEnding = $inEnding;
        $product->save();

        $savedItemID = $product->getPrimaryKey();
        if ($savedItemID > 0)
        {
            $randItemImages = mt_rand(0, 3);
            if ($randItemImages > 0)
            {
                $i = 0;
                $imagePosition = 0;
                while ($randItemImages > $i)
                {
                    $randImage = mt_rand(0, 2);
                    $obRandImage = '';
                    if ($randImage > 0) {
                        $obRandImage = Images::ARRAY_IMAGES[$randImage];
                        $producImages = new Images();
                        $producImages->position = $imagePosition;
                        $producImages->filename = $obRandImage;
                        $producImages->url = $obRandImage;
                        $producImages->item_id_image = $savedItemID;
                        $producImages->save();
                        if ($imagePosition == 0)
                        {
                            $productAddMainImage = $product::findOne([
                                'id' => $savedItemID
                            ]);
                            $productAddMainImage->image = $obRandImage;
                            $productAddMainImage->update();
                        }
                        $imagePosition++;
                    }
                    $i++;
                }
            }
        }

        return $product;
    }

}