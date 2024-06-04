<?php

use app\models\Categoty;
use yii\helpers\Html;


$allCatCreated = $allCatCreated;
$startCreateCategoriesExist = $startCreateCategoriesExist;

?>

<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1>Генерация по категориям (<?= $count; ?>)</h1>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-12 mb-3">
                <?
                    if ($allCatCreated != '')
                    {
                        echo $allCatCreated;
                    } else {
                        echo $startCreateCategoriesExist;
                    }
                ?>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 mb-12">
                <?= Html::a('Обратно в генерацию', ['migrate'], ['class' => 'btn btn-primary']) ?>
            </div>
        </div>

    </div>

</div>
