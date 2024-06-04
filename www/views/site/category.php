<?php

use yii\helpers\Html;

$this->title = 'Каталог';

?>

<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1>Категории</h1>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4 mb-3">
                <h2>Категория</h2>
                <?= Html::img('/img/empty.png', ['class' => 'category_img']) ?>
            </div>
        </div>

    </div>

</div>