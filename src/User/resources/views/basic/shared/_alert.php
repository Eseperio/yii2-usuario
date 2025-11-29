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

/** @var \Da\User\Module $module */

?>

<?php if ($module->enableFlashMessages): ?>
    <div class="user-alerts">
        <?php foreach (Yii::$app->session->getAllFlashes(true) as $type => $message): ?>
            <?php if (in_array($type, ['success', 'danger', 'warning', 'info'], true)): ?>
                <div class="user-alert user-alert-<?= $type ?>">
                    <?= Html::encode($message) ?>
                </div>
            <?php endif ?>
        <?php endforeach ?>
    </div>
<?php endif ?>
