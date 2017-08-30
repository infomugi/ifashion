<?php
$this->breadcrumbs=array(
	'Kategoris',
);

$this->menu=array(
	array('label'=>'Create Kategori','url'=>array('create')),
	array('label'=>'Manage Kategori','url'=>array('admin')),
);
?>

<h1>Kategoris</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
