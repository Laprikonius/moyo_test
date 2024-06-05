<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Каталог';

?>

<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1>Категории</h1>
    </div>

    <div class="body-content">
        
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

    </div>

</div>