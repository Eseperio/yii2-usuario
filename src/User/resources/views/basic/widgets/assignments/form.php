<?php

/*
 * This file is part of the 2amigos/yii2-usuario project.
 *
 * (c) 2amigOS! <http://2amigos.us/>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var \yii\web\View $this */
/** @var string[] $availableItems */
/** @var Da\User\Model\Assignment $model */


?>

<?php if ($model->updated): ?>
    <div class="user-alert user-alert-success">
        <?= Html::encode(Yii::t('usuario', 'Assignments have been updated')) ?>
    </div>
<?php endif ?>

<?php $form = ActiveForm::begin(
    [
        'enableClientValidation' => false,
        'enableAjaxValidation' => false,
    ]
) ?>

<?= Html::activeHiddenInput($model, 'user_id') ?>

<?= $form->field($model, 'items')->checkboxList($availableItems, ['id' => 'children']) ?>

<?= Html::submitButton(Yii::t('usuario', 'Update assignments'), []) ?>

<?php ActiveForm::end() ?>
