<?php

use shop\forms\manage\Shop\CharacteristicForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model CharacteristicForm */

$this->title = 'Create Characteristic';
$this->params['breadcrumbs'][] = ['label' => 'Characteristics', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="characteristic-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
