<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Todo */
?>
<div class="todo-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'category_id',
            'timestamp',
        ],
    ]) ?>

</div>
