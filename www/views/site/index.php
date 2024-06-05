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
                    <div class="col-lg-4 mb-3">
                        <h2><?= Html::a($category->title, ['category-view', 'id' => $catID], $options = ['class' => 'btn btn-link']) ?></h2>
                        <?= Html::beginTag('a', ['class' => 'btn btn-link', 'href' => Url::to(['category-view', 'id' => $catID])]) ?><?= Html::img($categoryImage, ['class' => 'category_img', 'height' => 270]) ?><?= Html::endTag('a') ?>
                    </div>
                    <?
                }
                ?>
            </div>
        </div>

        <div class="container">
            <div class="jumbotron text-center bg-transparent mt-5 mb-5">
                <h2>Товары <?= $itemsCount ?> </h2>
            </div>

            <div class="row">
                <?php
                foreach ($renderItems as $key => $item) {
                    ?>
                    <div class="col-lg-4 mb-3">
                    <h2><?= $item->title . ': id: ' . $item->id ?></h2>
                        <?= Html::a($item->title, ['item-view', 'id' => $item->id], $options = ['class' => 'item_link']) ?>
                        <p><?= $item->description ?></p>
                    </div>
                    <?
                }
                ?>
            </div>
        </div>

    </div>

</div>
