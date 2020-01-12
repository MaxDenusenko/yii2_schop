<?php

use shop\forms\manage\Shop\BrandForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model BrandForm */

$this->title = 'Create Brand';
$this->params['breadcrumbs'][] = ['label' => 'Brands', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="brand-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
