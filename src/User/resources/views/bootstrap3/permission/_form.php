<?php

/*
 * This file is part of the 2amigos/yii2-usuario project.
 *
 * (c) 2amigOS! <http://2amigos.us/>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var Da\User\Model\Permission $model
 * @var string[] $unassignedItems
 */

?>

<?php $form = ActiveForm::begin(
    [
        'enableClientValidation' => false,
        'enableAjaxValidation' => true,
    ]
) ?>

<?= $form->field($model, 'name') ?>

<?= $form->field($model, 'description') ?>

<?= $form->field($model, 'rule')->dropDownList(
    ArrayHelper::map(Yii::$app->getAuthManager()->getRules(), 'name', 'name'),
    ['prompt' => Yii::t('usuario', 'Select rule...')]
) ?>


<?= $form->field($model, 'children')->checkboxList($unassignedItems, ['id' => 'children']) ?>

<?= Html::submitButton(Yii::t('usuario', 'Save'), ['class' => 'btn btn-success btn-block']) ?>

<?php ActiveForm::end() ?>
