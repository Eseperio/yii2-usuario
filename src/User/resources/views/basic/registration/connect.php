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
 * @var yii\web\View                        $this
 * @var yii\widgets\ActiveForm              $form
 * @var \Da\User\Model\User                 $model
 * @var \Da\User\Model\SocialNetworkAccount $account
 */

$this->title = Yii::t('usuario', 'Sign in');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-container">
    <div class="user-content">
        <div class="user-panel">
            <div class="user-panel-heading">
                <h3 class="user-panel-title"><?= Html::encode($this->title) ?></h3>
            </div>
            <div class="user-panel-body">
                <div class="user-alert user-alert-info">
                    <p>
                        <?= Yii::t(
                            'usuario',
                            'In order to finish your registration, we need you to enter following fields'
                        ) ?>:
                    </p>
                </div>
                <?php $form = ActiveForm::begin(
                    [
                        'id' => $model->formName(),
                    ]
                ); ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'username') ?>

                <?= Html::submitButton(Yii::t('usuario', 'Continue'), []) ?>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
        <p>
            <?= Html::a(
                Yii::t(
                    'usuario',
                    'If you already registered, sign in and connect this account on settings page'
                ),
                ['/user/settings/networks']
            ) ?>.
        </p>
    </div>
</div>
