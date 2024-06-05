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

        <div class="container">
            <div class="jumbotron text-center bg-transparent mt-5 mb-5">
                <h2>Товары</h2>
            </div>

            <div class="row">
                <?php
                foreach ($categoryItems as $key => $item) {
                    $itemID = $item->id;
                    if (isset($obProductsImages[$itemID]))
                    {
                        $productImage = $obProductsImages[$itemID];
                    } else {
                        $productImage = '/img/empty.png';
                    }
                    ?>
                    <div class="col-lg-4 mb-3 text-center">
                        <div class="text-center"><?= Html::a($item->title . ', id: ' . $itemID, ['item-view', 'id' => $itemID], $options = ['class' => 'item_link']) ?></div>
                        <?= Html::beginTag('a', ['class' => 'btn btn-link', 'href' => Url::to(['item-view', 'id' => $itemID])]) ?><?= Html::img($productImage, ['class' => 'category_img', 'height' => 270]) ?><?= Html::endTag('a') ?>
                        <p class="mb-0"><?= $item->description ?></p>
                        <p class="mb-0">Id: <?= $itemID ?></p>
                        <p class="mb-0">categoryName: <?= $categoryName[$itemID] ?></p>
                        <p class="mb-0">name: <?= $item->title ?></p>
                        <p class="mb-0">price: <?= ($item->price_discount > 0) ? 'price_discount ' . $item->price_discount : (($item->price > 0) ? 'price ' . $item->price : 0) ?></p>
                        <p class="mb-0">inStock: <?= ($item->quantity > 0 && ($item->price_discount > 0 || $item->price > 0)) ? 'true' : 'false' ?></p>
                    </div>
                    <?
                }
                ?>
            </div>
        </div>

    </div>

</div>

<?php