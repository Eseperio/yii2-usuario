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

/** @var \yii\web\View $this */
/** @var string $content */

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
                <?= $content ?>
            </div>
        </div>
    </div>
</div>
