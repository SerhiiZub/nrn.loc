<?php
/* @var $this EventOrganizersBackendController */
/* @var $model EventOrganizers */

$this->breadcrumbs=array(
	'Event Organizers'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List EventOrganizers', 'url'=>array('index')),
	array('label'=>'Create EventOrganizers', 'url'=>array('create')),
	array('label'=>'Update EventOrganizers', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete EventOrganizers', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EventOrganizers', 'url'=>array('admin')),
);
?>

<h1>View EventOrganizers #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',
		'city',
		'address',
		'phone',
		'email',
		'image',
		'public_key',
		'private_key',
		'create_user_id',
		'update_user_id',
		'create_time',
		'update_time',
	),
)); ?>
