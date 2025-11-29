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

/**
 * @var yii\web\View            $this
 * @var \Da\User\Form\LoginForm $model
 * @var \Da\User\Module         $module
 */

$this->title = Yii::t('usuario', 'Sign in');
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('/shared/_alert', ['module' => Yii::$app->getModule('user')]) ?>

<div class="user-container">
    <div class="user-content">
        <div class="user-panel">
            <div class="user-panel-heading">
                <h3 class="user-panel-title"><?= Html::encode($this->title) ?></h3>
            </div>
            <div class="user-panel-body">
                <?php $form = ActiveForm::begin(
                    [
                        'id' => $model->formName(),
                        'enableAjaxValidation' => true,
                        'enableClientValidation' => false,
                        'validateOnBlur' => false,
                        'validateOnType' => false,
                        'validateOnChange' => false,
                    ]
                ) ?>
                <?= $form->field(
                    $model,
                    'twoFactorAuthenticationCode',
                    ['inputOptions' => ['autofocus' => 'autofocus', 'tabindex' => '1']]
                ) ?>
                <div class="user-container">
                    <div class="user-half">
                        <?= Html::a(
                            Yii::t('usuario', 'Cancel'),
                            ['login'],
                            [ 'tabindex' => '3']
                        ) ?>
                    </div>
                    <div class="user-half">
                        <?= Html::submitButton(
                            Yii::t('usuario', 'Confirm'),
                            ['tabindex' => '3']
                        ) ?>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
