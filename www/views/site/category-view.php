<?php

use Yii;
use yii\helpers\Html;

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
        </div>

    </div>

</div>

<?php