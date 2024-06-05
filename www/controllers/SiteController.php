<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Category;
use app\models\Products;
use app\models\Images;
use yii\data\Pagination;
use yii\helpers\Inflector;

class SiteController extends Controller
{

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }

    public function actionIndex()
    {
        $category = new Category();
        $categories = $category::find();

        $paginationCategory = new Pagination([
            'defaultPageSize' => 3,
            'totalCount' => $categories->count()
        ]);

        $renderCategories = $categories->orderBy('name')
            ->offset($paginationCategory->offset)
            ->limit($paginationCategory->limit)
            ->all();

        $obItems = new Products();
        $arItems = $obItems::find();

        $paginationItems = new Pagination([
            'defaultPageSize' => 6,
            'totalCount' => $arItems->count()
        ]);

        $renderItems = $arItems->orderBy('title')
            ->offset($paginationItems->offset)
            ->limit($paginationItems->limit)
            ->all();

        $categoryImage = new Images();
        $obImages = [];

        foreach ($categories->all() as $category)
        {
            if ($category->image != '') {
                $categoryImage = $categoryImage::find()->where([
                    'category_id_image' => $category->id,
                ])->one();
                $obImages[$category->id] = $categoryImage->url;
            }
        }
        
        return $this->render('index', [
            'categoriesCount' => $categories->count(),
            'categories' => $categories->all(),
            'renderCategories' => $renderCategories,
            'itemsCount' => $arItems->count(),
            'items' => $arItems->all(),
            'renderItems' => $renderItems,
            'obImages' => $obImages
        ]);
    }
    
    public function actionCategory(int $id)
    {
        return $this->render('category');
    }

    public function actionCategoryView(int $id)
    {
        $categoryID = $id;
        $category = new Category();
        $categories = $category::find()->where([
            'id' => $id,
        ])->one();

        $subcategories = '';

        $categoryImage = new Images();
        $obImages = [];

        if ($categories->subcategory > 0) {
            $subcategoryID = $categories->subcategory;
            $subcategories = $category::find()->where(['id' => $subcategoryID])->all();
            foreach ($subcategories as $category)
            {
                if ($category->image != '') {
                    $categoryImage = $categoryImage::find()->where([
                        'category_id_image' => $category->id,
                    ])->one();
                    $obImages[$category->id] = $categoryImage->url;
                }
            }
        }
        
        return $this->render('category-view', [
            'categoryView' => $categories,
            'categoryID' => $categoryID,
            'subcategories' => $subcategories,
            'obImages' => $obImages
        ]);
    }

    public function actionItemView(int $id)
    {
        $itemID = $id;
        $item = new Products();
        $items = $item::find()->where([
            'id' => $id,
        ])->one();
        
        return $this->render('item-view', [
            'itemView' => $items,
            'itemID' => $itemID,
        ]);
    }

    public function actionMigrate()
    {
        return $this->render('migrate');
    }

    public function actionCreateCategory()
    {
        //start create Categories // name = code
        $startCreateCategories = new Category();
        //
        $randNumber = Category::NUMBER_CATEGORIES;
        $allCatCreated = '';
        $startCreateCategoriesExist = '';
        $count = $startCreateCategories::find()->count();
        for ($i = 0; $i < $randNumber; $i++) {
            if ($count < $randNumber)
            {
                $rand = mt_rand(0, 1);
                $randImage = mt_rand(0, 2);
                $obRandImage = '';
                if ($randImage > 0) {
                    $obRandImage = Images::ARRAY_IMAGES[$randImage];
                    //

                    //
                }
                $title = 'Категория ' . $i;
                $obName = preg_replace('|\s+|', ' ', strtolower($title));
                $name = Inflector::transliterate(str_replace(' ', '-', $obName));
                $desription = 'Категория desription ' . $i;
                $image = $obRandImage;
                $saveCategory = Category::saveCategory($title, $name, $desription, $image);
                $savedCategoryID = $saveCategory->getPrimaryKey();
                if ($savedCategoryID > 0 && $rand > 0)
                {
                    $addSubcategory = $startCreateCategories::findOne([
                        'id' => $savedCategoryID
                    ]);
                    $randSubcategoryID = mt_rand(1, 10);
                    $addSubcategory->subcategory = $randSubcategoryID;
                    $addSubcategory->update();
                }
                if ($savedCategoryID > 0 && $randImage > 0)
                {
                    $categoryImage = new Images();
                    $categoryImage->position = 0;
                    $categoryImage->filename = $obRandImage;
                    $categoryImage->url = $obRandImage;
                    $categoryImage->category_id_image = $savedCategoryID;
                    $categoryImage->save();
                }
                unset($savedCategoryID);
                unset($randImage);
                $startCreateCategoriesExist = '10 Категорий создано!';
            } else {
                $allCatCreated = 'Все 10 категорий существуют, больше нельзя создать!';
            }
        };

        //end create categories
        return $this->render('create-category', [
            'allCatCreated' => $allCatCreated,
            'startCreateCategoriesExist' => $startCreateCategoriesExist,
            'count' => $count,
        ]);
    }

    public function actionCreateItems()
    {
        //start creating Items
        $products = new Products();
        $randNumber = Products::NUMBER_ITEMS;
        $allItmCreated = '';
        $startCreateItmExist = '';
        $count = $products::find()->count();
        for ($i = 0; $i < $randNumber; $i++) {
            if ($count < $randNumber)
            {
                $title = 'Товар '. $i;
                $desription = 'Товар desription '. $i;
                $price = rand(1, 100000);
                $price_discount = rand(0, 10);
                $quantity = rand(0, 100);
                $created_at = date('Y-m-d H:i:s');
                $updated_at = date('Y-m-d H:i:s');
                $image = 'Товар image '. $i;
                $saveProduct = Products::saveProduct($title, $desription, $price, $price_discount, $quantity, $created_at, $updated_at, $image);
                $startCreateItmExist = '100 Товаров создано!';
            } else {
                $allItmCreated = 'Все 100 товаров существуют, больше нельзя создать!';
            }
        }
        //end create Items
        return $this->render('create-items', [
            'allItmCreated' => $allItmCreated,
            'startCreateItmExist' => $startCreateItmExist,
            'count' => $count
        ]);
    }

}
