<?php

use Yii;
use yii\helpers\Html;
use yii\helpers\Url;

?>
<pre>
    <? //var_dump($categoryView) ?>
</pre>

<div class="site-index">

    <div class="body-content">

        <div class="jumbotron text-center bg-transparent mt-5 mb-5">
            <h1 class="display-4">Moyo test View</h1>

            <h2><?= $categoryView->name ?></h2>

            <h3>Категория <?= $categoryView->name ?></h3>

            <h4>ID: <?= $categoryView->id ?></h4>
        </div>
        
        <?php
        if (isset($subcategories) && $subcategories > 0) {
            foreach ($subcategories as $subcategory) {
                $catID = $subcategory->id;
                if (isset($obImages[$catID]))
                {
                    $categoryImage = $obImages[$catID];
                } else {
                    $categoryImage = '/img/empty.png';
                }
                ?>
                <div class="col-lg-4 mb-3">
                    <h2><?= Html::a($subcategory->name, ['category-view', 'id' => $catID], $options = ['class' => 'btn btn-link'])?></h2>
                    <?= Html::beginTag('a', ['class' => 'btn btn-link', 'href' => Url::to(['category-view', 'id' => $catID])])?><?= Html::img($categoryImage, ['class' => 'category_img', 'height' => 270])?><?= Html::endTag('a')?>
                    <p><?= $subcategory->description?></p>
                </div>
                <?
            }
        }
        ?>

    </div>

</div>

<?php