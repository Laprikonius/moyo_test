<?php

use yii\helpers\Html;
use app\models\Products;

?>

<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1>Генерация по товарам (<?= $count ?>)</h1>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-12 mb-3">
                <?
                    if ($allItmCreated != '')
                    {
                        echo $allItmCreated;
                    } else {
                        echo $startCreateItmExist;
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

<?php
