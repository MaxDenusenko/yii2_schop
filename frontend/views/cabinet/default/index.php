<?php

/** @var View $this */

use yii\authclient\widgets\AuthChoice;
use yii\helpers\Html;
use yii\web\View;

$this->title = 'Cabinet';
$this->params['breadcrumb'][] = $this->title;
?>

<div class="cabinet-index">
    <h1><?= Html::encode($this->title)?></h1>

    <p>Hello</p>

    <h2>Attach profile</h2>
    <?= AuthChoice::widget([
        'baseAuthUrl' => ['auth/network/attach'],
        'popupMode' => false,
    ])?>
</div>
