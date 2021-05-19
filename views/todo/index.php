<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TodoCrud */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Todos';
// $this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);

?>
<div class="todo-index">
    <div class="row">
        <div class="col-sm-2">
            <?php echo Html::img('@web/logo1.png', ['class' => 'img-thumbnail img-fluid mx-auto float-start', 'height'=>'150px', 'width'=>'150px']); ?>
        </div>
        <div class="col-sm-10">
            <h1 class='text-center'>TO-DO List Application!</h1>
            <p class="text-center lead">Where to-do items are added/deleted and belong to categories.</p>
        </div>
    </div>


    <div id="ajaxCrudDatatable">
        <?=GridView::widget([
            'id'=>'crud-datatable',
            'dataProvider' => $dataProvider,
            // 'filterModel' => $searchModel, //###############################################
            'pjax'=>true,
            'columns' => require(__DIR__.'/_columns.php'),
            'toolbar'=> [
                ['content'=>
                    Html::a('<i class="glyphicon glyphicon-plus">AddNewToDo</i>', ['create'],
                    ['role'=>'modal-remote','title'=> 'Create new Todos','class'=>'btn btn-default'])
                    // Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''],
                    // ['data-pjax'=>1, 'class'=>'btn btn-default', 'title'=>'Reset Grid']).
                    // '{toggleData}'.
                    // '{export}'
                ],
            ],          
            'striped' => true,
            'condensed' => true,
            'responsive' => true,        
            'panel' => [
                // 'type' => 'primary',     //################################
                // 'heading' => '<i class="glyphicon glyphicon-list"></i> Todos listing',    //###############################################
                // 'before'=>'<em>* Resize table columns just like a spreadsheet by dragging the column edges.</em>',   //###############################################
                                       
                '<div class="clearfix"></div>',
            ]
        ])?>
    </div>




</div>
<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    "footer"=>"",// always need it for jquery plugin
])?>
<?php Modal::end(); ?>
