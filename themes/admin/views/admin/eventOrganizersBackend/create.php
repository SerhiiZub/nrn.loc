<?php
/* @var $this EventOrganizersBackendController */
/* @var $model EventOrganizers */

$this->breadcrumbs=array(
	'Event Organizers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EventOrganizers', 'url'=>array('index')),
	array('label'=>'Manage EventOrganizers', 'url'=>array('admin')),
);
?>

<h1>Create EventOrganizers</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>