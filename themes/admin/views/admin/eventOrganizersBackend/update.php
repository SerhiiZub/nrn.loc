<?php
/* @var $this EventOrganizersBackendController */
/* @var $model EventOrganizers */

$this->breadcrumbs=array(
	'Event Organizers'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List EventOrganizers', 'url'=>array('index')),
	array('label'=>'Create EventOrganizers', 'url'=>array('create')),
	array('label'=>'View EventOrganizers', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage EventOrganizers', 'url'=>array('admin')),
);
?>

<h1>Update EventOrganizers <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>