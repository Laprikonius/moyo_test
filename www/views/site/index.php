<?php

use yii\helpers\Html;

$this->title = 'Moyo test';
?>
<div class="site-index">

    <div class="body-content">

        <div class="jumbotron text-center bg-transparent mt-5 mb-5">
            <h1 class="display-4">Moyo test</h1>

            <h2>Категории</h2>
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
                <h2>Товары</h2>
            </div>

            <div class="row">
                <div class="col-lg-4 mb-3">
                    <h2>Heading</h2>
                    <?= Html::a('Товар', ['/category/item', 'id' => 1], $options = ['class' => 'item_link']) ?>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                        ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                        fugiat nulla pariatur.</p>
                </div>
            </div>
        </div>

    </div>

</div>
