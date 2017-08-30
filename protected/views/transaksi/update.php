<?php
/* @var $this TransaksiController */
/* @var $model Transaksi */

$this->breadcrumbs=array(
	'Transaksis'=>array('index'),
	$model->id_transaksi=>array('view','id'=>$model->id_transaksi),
	'Edit',
	);

	$this->pageTitle='Edit Transaksi';
	?>

	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>