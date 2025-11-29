<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/** @var \yii\base\DynamicModel $model */
/** @var string $gdpr_consent_hint */
?>

<div class="user-container">
    <div class="user-content">
        <?php $form = ActiveForm::begin(
            [
                'id' => $model->formName(),
            ]
        ); ?>
        <div class="panel panel-info give-consent-panel">
            <div class="user-panel-heading">
                <h1 class="user-panel-title"><?= Yii::t('usuario', 'Data privacy') ?></h1>
            </div>
            <div class="user-panel-body">

                <p><?= Yii::t('usuario', 'According to the European General Data Protection Regulation (GDPR) we need your consent to work with your personal data.') ?></p>
                <p><?php Yii::t('usuario', 'Unfortunately, you can not work with this site without giving us consent to process your data.') ?></p>

                <?= $form->field($model, 'gdpr_consent')->checkbox(['value' => 1, 'label' => $gdpr_consent_hint])?>

            </div>
            <div class="panel-footer">
                <?= Html::submitButton(Yii::t('usuario', 'Submit'), []) ?>
                <p class="pull-right small"><?= Html::a(Yii::t('usuario', 'Account details'), ['/user/settings']) ?></p>
            </div>
        </div>
        <?php ActiveForm::end(); ?>

    </div>
</div>
