<?php
$this->breadcrumbs=array(
	'Barangs',
);
$this->menu=array(
	array('label'=>'Barang','url'=>array('index')),
);
?>

<h1>Stock of Name</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
