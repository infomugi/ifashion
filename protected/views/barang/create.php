<?php
$this->breadcrumbs=array(
	'Barangs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Kelola Barang','url'=>array('admin')),
);
?>

<h3>Tambah Barang</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>