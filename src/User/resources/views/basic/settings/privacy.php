<?php

use yii\helpers\Html;

/** @var \yii\web\View $this */
/** @var \Da\User\Module $module */

$this->title = Yii::t('usuario', 'Privacy settings');

?>

<div class="user-container">
    <div class="user-sidebar">
        <?= $this->render('_menu') ?>
    </div>
    <div class="user-main">
        <div class="user-panel">
            <div class="user-panel-heading">
                <h3 class="user-panel-title"><?= Html::encode($this->title) ?></h3>
            </div>
            <div class="user-panel-body">
                <div class="user-container">
                    <div class="user-half">
                        <h3><?= Yii::t('usuario', 'Export my data') ?></h3>
                        <p><?= Yii::t(
                                'usuario',
                                'Here you can download your personal data in a comma separated values format.'
                            ) ?>
                        </p>
                        <?= Html::a(Yii::t('usuario', 'Download my data'),
                            ['/user/settings/export'],
                            [
                                'target' => '_blank'
                            ])
                        ?>
                    </div>
                    <div class="user-half">
                        <h3><?= Yii::t('usuario', 'Delete my account') ?></h3>
                        <p><?= Yii::t(
                                'usuario',
                                'This will remove your personal data from this site. You will no longer be able to sign in.'
                            ) ?>
                        </p>
                        <?php if ($module->allowAccountDelete): ?>
                            <?= Html::a(
                                Yii::t('usuario', 'Delete account'),
                                ['delete'],
                                [
                                    'id' => 'gdpr-del-button',
                                    'data-method' => 'post',
                                    'data-confirm' => Yii::t('usuario', 'Are you sure? There is no going back'),
                                ]
                            ) ?>
                        <?php else:
                            echo Html::a(Yii::t('usuario', 'Delete'),
                                ['/user/settings/gdpr-delete'],
                                [
                                    'id' => 'gdpr-del-button',

                                ])
                            ?>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
