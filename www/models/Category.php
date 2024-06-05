<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use app\models\Images;

class Category extends ActiveRecord
{

    const NUMBER_CATEGORIES = 10;

    public static function tableName()
    {
        return 'category';
    }

    public static function saveCategory(string $title, string $name, string $desription, string $image)
    {
        $category = new Category();
        $category->title = $title;
        $category->name = $name;
        $category->description = $desription;
        $category->image = $image;
        $category->save();

        return $category;
    }
}