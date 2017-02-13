<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model yii\web\IdentityInterface */
/* @var $fullnameField string */

$userName = $model->{$usernameField};
if (!empty($fullnameField)) {
    $userName .= ' (' . ArrayHelper::getValue($model, $fullnameField) . ')';
}
$userName = Html::encode($userName);

$this->title = Yii::t('rbac-admin', 'Assignment') . ' : ' . $userName;

$this->params['breadcrumbs'][] = ['label' => Yii::t('rbac-admin', 'Assignments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $userName;


$opts = Json::htmlEncode([
        'assignUrl' => Url::to(['assign', 'id' => $model->$idField]),
        'items' => $items
    ]);
$this->registerJs("var _opts = {$opts};");
$this->registerJs($this->render('_script.js'));
?>
<section class="wrapper">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    <?=$this->title?>
                </header>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-5">
                            <input class="form-control search" data-target="avaliable"
                                   placeholder="<?= Yii::t('rbac-admin', 'Search for avaliable') ?>">
                            <select multiple size="20" class="form-control list" data-target="avaliable">
                            </select>
                        </div>
                        <div class="col-lg-1">
                            <br><br>
                            <a href="#" class="btn btn-success btn-assign" data-action="assign">&gt;&gt;</a><br>
                            <a href="#" class="btn btn-danger btn-assign" data-action="remove">&lt;&lt;</a>
                        </div>
                        <div class="col-lg-5">
                            <input class="form-control search" data-target="assigned"
                                   placeholder="<?= Yii::t('rbac-admin', 'Search for assigned') ?>">
                            <select multiple size="20" class="form-control list" data-target="assigned">
                            </select>
                        </div>
                    </div>
            </section>
        </div>

    </div>
</section>