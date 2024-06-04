<?php

use yii\helpers\Html;

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
                    //$options = ['class' => 'category_link'];
                    ?>
                    <div class="col-lg-4 mb-3">
                        <h2><?= Html::a($category->title, ['category-view', 'id' => $category->id], $options = ['class' => 'btn btn-link']) ?></h2>
                        <?= Html::a($category->title, ['category-view', 'id' => $category->id], $options = ['class' => 'btn btn-link']) ?>
                        <a href=""><?= Html::img('/img/empty.png', ['class' => 'category_img']) ?></a>
                        <p><?= $category->description ?></p>
                        <?= Html::a($category->title, ['category-view', 'id' => $category->id], $options = ['class' => 'btn btn-link']) ?>
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
