<?php

/*
 * This file is part of the 2amigos/yii2-usuario project.
 *
 * (c) 2amigOS! <http://2amigos.us/>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

use yii\widgets\ActiveForm;
use yii\widgets\Menu;
use yii\helpers\Html;

/**
 * @var yii\web\View        $this
 * @var \Da\User\Model\User $user
 */

$this->title = Yii::t('usuario', 'Create a user account');
$this->params['breadcrumbs'][] = ['label' => Yii::t('usuario', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="clearfix"></div>
<?= $this->render(
    '/shared/_alert',
    [
        'module' => Yii::$app->getModule('user'),
    ]
) ?>

<div class="user-container">
    <div class="user-full">
        <div class="user-panel">
            <div class="user-panel-heading">
                <h3 class="user-panel-title"><?= Html::encode($this->title) ?></h3>
            </div>
            <div class="user-panel-body">
                <?= $this->render('/shared/_menu') ?>
                <div class="user-container">
                    <div class="user-sidebar">
                        <div class="user-panel">
                            <div class="user-panel-body">
                                <?= Menu::widget(
                                    [
                                        'options' => [
                                            'class' => 'user-side-menu',
                                        ],
                                        'items' => [
                                            [
                                                'label' => Yii::t('usuario', 'Account details'),
                                                'url' => ['/user/admin/create'],
                                            ],
                                            [
                                                'label' => Yii::t('usuario', 'Profile details'),
                                                'options' => [
                                                    'class' => 'disabled',
                                                ],
                                            ],
                                            [
                                                'label' => Yii::t('usuario', 'Information'),
                                                'options' => [
                                                    'class' => 'disabled',
                                                ],
                                            ],
                                        ],
                                    ]
                                ) ?>
                            </div>
                        </div>
                    </div>
                    <div class="user-main">
                        <div class="user-panel">
                            <div class="user-panel-body">
                                <div class="user-alert user-alert-info">
                                    <?= Yii::t('usuario', 'Credentials will be sent to the user by email') ?>.
                                    <?= Yii::t(
                                        'usuario',
                                        'A password will be generated automatically if not provided'
                                    ) ?>.
                                </div>
                                <?php $form = ActiveForm::begin(
                                    [
                                        'enableAjaxValidation' => true,
                                        'enableClientValidation' => false,
                                    ]
                                ); ?>

                                <?= $this->render('/admin/_user', ['form' => $form, 'user' => $user]) ?>

                                <div class="form-group">
                                    <?= Html::submitButton(Yii::t('usuario', 'Save'), []) ?>
                                </div>

                                <?php ActiveForm::end(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
