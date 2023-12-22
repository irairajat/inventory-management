<?php

use app\models\Items;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\Search\ItemsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="items-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Items', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <p>Note : Sync Button is disabled because no external api is found.</p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'attribute' => 'category_id',
                'value' => function($data){
                    return $data->category_name;
                }
            ],
            [
                'filter' => ['1' => 'Active', '0' => 'Inactive'],
                'filterInputOptions' => ['prompt' => 'All', 'class' => 'form-control'],
                'attribute' => 'status',
                'value' => function($data){
                    if($data->status == "1"){
                        return 'Active';
                    }
                    else{
                        return 'Inactive';
                    }
                },
            ],
            [
                'attribute' => 'quantity',
                'value' => function($data){
                    if($data->quantity){
                        return $data->quantity;
                    }
                    else{
                        return 'N/A';
                    }
                    
                }
            ],
            [
                'attribute' => 'price',
                'value' => function($data){
                    if($data->price){
                        return $data->price;
                    }
                    else{
                        return 'N/A';
                    }
                }
            ],
            [
                'attribute' => 'supplier_info',
                'value' => function($data){
                    if($data->supplier_info){
                        return $data->supplier_info;
                    }
                    else{
                        return 'N/A';
                    }
                }
            ],
            'created_at',
            'updated_at',
            [
                'label' => 'Action',
                'format' => 'raw',
                'value' => function($data){
                    return '<button class="btn btn-primary" onclick="syncDetail('.$data->id.','.$data->name.')" disabled>Sync</button>';
                }
            ],  
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Items $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
<script>
    function syncDetail(id, name){
        $.ajax({
            url: '<?php echo Yii::$app->request->baseUrl. '/inventory/fetch-data' ?>',
            type: 'get',
            data: {
                id: id , 
                product_name: name 
            },
            success: function (data) {
               window.reload();
            }
        });
    }
</script>
