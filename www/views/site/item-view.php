<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>
<div class="container">
    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1><?= $itemView->title ?></h1>
    </div>

    <div class="row">
        <?php
        $itemID = $itemView->id;
        $item = $itemView;
        
        if (!empty($obImages)) {
            foreach ($obImages as $image)
            {
                ?>
                <div class="col-lg-4 mb-3 text-center">
                    <p>position: <?= $image->position ?></p>
                    <?= Html::img($image->url, ['class' => 'category_img', 'height' => 270]) ?>
                </div>
                <?
            }
        } else {
            ?>
            <div class="col-lg-4 mb-3 text-center">
                <p>Изображение отсутствует!</p>
                <?= Html::img('/img/empty.png', ['class' => 'category_img', 'height' => 270]) ?>
            </div>
            <?
        }
        ?>
        <div class="text-center">
            <p class="mb-0">id: <?= $itemID ?></p>
            <p class="mb-0">title: <?= $itemView->title ?></p>
            <p class="mb-0">description: <?= $itemView->description ?></p>
            <p class="mb-0">categoryName: <?= $categoryPath ?></p>
            <p class="mb-0">price: <?= $itemView->price ?></p>
            <p class="mb-0">price_discount: <?= $itemView->price_discount ?></p>
            <p class="mb-0">quantity: <?= $itemView->quantity ?></p>
            <p class="mb-0">created_at: <?= $itemView->created_at ?></p>
            <p class="mb-0">updated_at: <?= $itemView->updated_at ?></p>
            <p class="mb-0">category_id: <?= $itemView->category_id ?></p>
            <p class="mb-0">name: <?= $itemView->name ?></p>
            <p class="mb-0">inStock: <?= $itemView->inStock ?></p>
            <p class="mb-0">inEnding: <?= $itemView->inEnding ?></p>
        </div>
        <?
        ?>
    </div>
</div>
<?