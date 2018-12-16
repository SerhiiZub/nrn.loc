<?php
/* @var $this EventOrganizersBackendController */
/* @var $dataProvider CActiveDataProvider */

//$this->breadcrumbs=array(
//	'Event Organizers',
//);
//
//$this->menu=array(
//	array('label'=>'Create EventOrganizers', 'url'=>array('create')),
//	array('label'=>'Manage EventOrganizers', 'url'=>array('admin')),
//);
//

$this->breadcrumbs = [
    $this->getModule()->getCategory() => [],
    Yii::t('EventModule.Event', 'Організатори') => ['/admin/organizers/index'],
    Yii::t('EventModule.Event', 'керування'),
];

$this->pageTitle = Yii::t('EventModule.Event', 'Організатори - керування');

//var_dump($model);die;
?>

<p>
    <a class="btn btn-default btn-sm dropdown-toggle" data-toggle="collapse" data-target="#search-toggle">
        <i class="fa fa-search">&nbsp;</i>
        <?=  Yii::t('EventModule.Event', 'Пошук організаторів');?>
        <span class="caret">&nbsp;</span>
    </a>
</p>

<div id="search-toggle" class="collapse out search-form">
    <?php Yii::app()->clientScript->registerScript('search', "
        $('.search-form form').submit(function () {
            $.fn.yiiGridView.update('races-grid', {
                data: $(this).serialize()
            });

            return false;
        });
    ");
    $this->renderPartial('_search', ['model' => $model]);
    ?>
</div>

<br/>

<p> <?=  Yii::t('EventModule.Event', 'В данном разделе представлены средства управления організаторами'); ?>
</p>

<?php
$this->widget(
    'yupe\widgets\CustomGridView',
    [
        'id'           => 'races-grid',
        'type'         => 'striped condensed',
        'dataProvider' => $model->search(),
        'filter'       => $model,
        'columns'      => [
            'id',
            'name',
            'description',

            [
                'class' => 'yupe\widgets\CustomButtonColumn',
            ],
        ],
    ]
); ?>

<?php //$this->widget('zii.widgets.CListView', array(
//	'dataProvider'=>$dataProvider,
//	'itemView'=>'_view',
//)); ?>

