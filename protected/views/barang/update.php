<?php
$this->breadcrumbs=array(
	'Barangs'=>array('index'),
	$model->kode_barang=>array('view','id'=>$model->kode_barang),
	'Update',
	);

$this->menu=array(
	array('label'=>'Kelola Barang','url'=>array('admin')),
	array('label'=>'Tambah Barang','url'=>array('create')),
	array('label'=>'Detail Barang','url'=>array('view','id'=>$model->id_barang)),
	);
	?>

	<h1>Edit - #<?php echo $model->kode_barang; ?></h1>

	<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>