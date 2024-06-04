<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Category;
use app\models\Products;
use yii\widgets\LinkPager;
use yii\data\Pagination;

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
        
        return $this->render('index', [
            'categoriesCount' => $categories->count(),
            'categories' => $categories->all(),
            'renderCategories' => $renderCategories,
            'itemsCount' => $arItems->count(),
            'items' => $arItems->all(),
            'renderItems' => $renderItems
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
        //var_dump($categories);
        return $this->render('category-view', [
            'categoryView' => $categories,
            'categoryID' => $categoryID,
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
                $title = 'Категория ' . $i;
                $name = 'Категория Code ' . $i;
                $desription = 'Категория desription ' . $i;
                $image = 'Категория image ' . $i;
                $saveCategory = Category::saveCategory($title, $name, $desription, $image);
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
