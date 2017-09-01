<?php
/* @var $this PelangganController */
/* @var $model Pelanggan */
$this->pageTitle='Tambah Pelanggan';

$this->menu=array(
	array('label'=>'Kelola Pelanggan', 'url'=>array('admin')),
	);
	?>

	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>