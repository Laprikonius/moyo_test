<?php

use yii\helpers\Html;

$this->title = 'Генерация';

?>

<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1>Генерация</h1>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4 mb-3">
            <?= Html::a('Генерация категории', ['create-category'], ['class' => 'btn btn-success']) ?>
            <?= Html::a('Генерация товаров', ['create-items'], ['class' => 'btn btn-primary']) ?>
            </div>
        </div>

    </div>

</div>