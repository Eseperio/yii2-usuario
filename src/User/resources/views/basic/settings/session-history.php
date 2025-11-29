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
use yii\grid\GridView;
use yii\widgets\Pjax;
use Da\User\Model\SessionHistory;
use Da\User\Search\SessionHistorySearch;
use yii\web\View;
use yii\data\ActiveDataProvider;
use Da\User\Widget\SessionStatusWidget;

/**
 * @var View $this
 * @var SessionHistorySearch $searchModel
 * @var ActiveDataProvider $dataProvider
 */

$this->title = Yii::t('usuario', 'Session history');
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('/shared/_alert', ['module' => Yii::$app->getModule('user')]) ?>

<div class="user-container">
    <div class="user-sidebar">
        <?= $this->render('/settings/_menu') ?>
    </div>
    <div class="user-main">
        <div class="user-panel">
            <div class="user-panel-heading">
                <?= Html::encode($this->title) ?>
                <?= Html::a(
                    Yii::t('usuario', 'Terminate all sessions'),
                    ['/user/settings/terminate-sessions'],
                    [
                        'data-method' => 'post'
                    ]
                ) ?>
            </div>
            <div class="user-panel-body">

                <?php Pjax::begin(); ?>

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        'user_agent',
                        'ip',
                        [
                            'contentOptions' => [
                                'class' => 'text-nowrap',
                            ],
                            'label' => Yii::t('usuario', 'Status'),
                            'value' => function (SessionHistory $model) {
                                return SessionStatusWidget::widget(['model' => $model]);
                            },
                        ],
                        [
                            'attribute' => 'updated_at',
                            'format' => 'datetime'
                        ],
                    ],
                ]); ?>
                <?php Pjax::end(); ?>
            </div>
        </div>
    </div>
</div>
