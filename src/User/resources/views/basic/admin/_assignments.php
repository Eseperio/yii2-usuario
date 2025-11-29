<?php

/*
 * This file is part of the 2amigos/yii2-usuario project.
 *
 * (c) 2amigOS! <http://2amigos.us/>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

use Da\User\Widget\AssignmentsWidget;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var Da\User\Model\User $user */
/** @var string[] $params */
/** @var \Da\User\Module $module */

?>

<?php $this->beginContent($module->viewPath. '/admin/update.php', ['user' => $user]) ?>

<div class="user-alert user-alert-info">
    <?= Html::encode(Yii::t('usuario', 'You can assign multiple roles or permissions to user by using the form below')) ?>
</div>

<?= AssignmentsWidget::widget(['userId' => $user->id, 'params' => $params]) ?>

<?php $this->endContent() ?>
