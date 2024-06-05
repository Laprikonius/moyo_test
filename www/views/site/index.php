<?php

use yii\helpers\Html;
use yii\helpers\Inflector;
use yii\helpers\Url;

$this->title = 'Moyo test';
?>
<div class="site-index">

    <div class="body-content">

        <div class="jumbotron text-center bg-transparent mt-5 mb-5">
            <h1 class="display-4">Moyo test</h1>

            <h2>Категории <?= $categoriesCount ?></h2>
        </div>

        <div class="container">
            <div class="row">
                <?php
                foreach ($categories as $category) {
                    $catID = $category->id;
                    if (isset($obImages[$catID]))
                    {
                        $categoryImage = $obImages[$catID];
                    } else {
                        $categoryImage = '/img/empty.png';
                    }
                    ?>
                    <div class="col-lg-4 mb-3 text-center">
                        <h2 class="text-center"><?= Html::a($category->title, ['category-view', 'id' => $catID], $options = ['class' => 'btn btn-link']) ?></h2>
                        <?= Html::beginTag('a', ['class' => 'btn btn-link', 'href' => Url::to(['category-view', 'id' => $catID])]) ?><?= Html::img($categoryImage, ['class' => 'category_img', 'height' => 270]) ?><?= Html::endTag('a') ?>
                    </div>
                    <?
                }
                ?>
            </div>
        </div>

        <div class="container">
            <div class="jumbotron text-center bg-transparent mt-5 mb-5">
                <h2>Ендпоінт 1 Товары</h2>
            </div>

            <div class="row">
                <?php
                foreach ($renderItems as $key => $item) {
                    $itemID = $item->id;
                    if (isset($obProductsImages[$itemID]))
                    {
                        $productImage = $obProductsImages[$itemID];
                    } else {
                        $productImage = '/img/empty.png';
                    }
                    ?>
                    <div class="col-lg-4 mb-3 text-center">
                        <div class="text-center"><?= Html::a($item->title . ', id: ' . $itemID, ['item-view', 'id' => $itemID], $options = ['class' => 'item_link']) ?></div>
                        <?= Html::beginTag('a', ['class' => 'btn btn-link', 'href' => Url::to(['item-view', 'id' => $itemID])]) ?><?= Html::img($productImage, ['class' => 'category_img', 'height' => 270]) ?><?= Html::endTag('a') ?>
                        <p class="mb-0"><?= $item->description ?></p>
                        <p class="mb-0">Id: <?= $itemID ?></p>
                        <p class="mb-0">categoryName: <?= $categoryName[$itemID] ?></p>
                        <p class="mb-0">name: <?= $item->title ?></p>
                        <p class="mb-0">price: <?= ($item->price_discount > 0) ? 'price_discount ' . $item->price_discount : (($item->price > 0) ? 'price ' . $item->price : 0) ?></p>
                        <p class="mb-0">inStock: <?= ($item->quantity > 0 && ($item->price_discount > 0 || $item->price > 0)) ? 'true' : 'false' ?></p>
                    </div>
                    <?
                }
                ?>
            </div>
        </div>

        <div class="container">
            <div class="jumbotron text-center bg-transparent mt-5 mb-5">
                <h2>Ендпоінт 2 Товары</h2>
            </div>

            <div class="row">
                <?php
                foreach ($renderItems2 as $key => $item) {
                    $itemID = $item->id;
                    if (isset($obProductsImages2[$itemID]))
                    {
                        $productImage = $obProductsImages2[$itemID];
                    } else {
                        $productImage = '/img/empty.png';
                    }
                    ?>
                    <div class="col-lg-4 mb-3 text-center">
                        <div class="text-center"><?= Html::a($item->title . ', id: ' . $itemID, ['item-view', 'id' => $itemID], $options = ['class' => 'item_link']) ?></div>
                        <?= Html::beginTag('a', ['class' => 'btn btn-link', 'href' => Url::to(['item-view', 'id' => $itemID])]) ?><?= Html::img($productImage, ['class' => 'category_img', 'height' => 270]) ?><?= Html::endTag('a') ?>
                        <p class="mb-0"><?= $item->description ?></p>
                        <p class="mb-0">Id: <?= $itemID ?></p>
                        <p class="mb-0">categoryName: <?= $categoryName2[$itemID] ?></p>
                        <p class="mb-0">name: <?= $item->title ?></p>
                        <p class="mb-0">price: <?= ($item->price > 0) ? $item->price : 0 ?></p>
                        <p class="mb-0">priceDiscount: <?= ($item->price_discount > 0 && $item->price_discount < $item->price) ? $item->price_discount : 0 ?></p>
                        <p class="mb-0">inEnding: <?= ($item->quantity > 0 && $item->quantity < 10) ? 'true' : 'false' ?></p>
                    </div>
                    <?
                }
                ?>
            </div>
        </div>

    </div>

</div>
