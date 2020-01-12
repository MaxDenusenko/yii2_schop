<?php

use shop\entities\Shop\Characteristic;
use shop\forms\manage\Shop\CharacteristicForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model CharacteristicForm */
/* @var $characteristic Characteristic */

$this->title = 'Update Characteristic: ' . $characteristic->name;
$this->params['breadcrumbs'][] = ['label' => 'Characteristics', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $characteristic->name, 'url' => ['view', 'id' => $characteristic->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="characteristic-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
