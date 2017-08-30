<?php
/* @var $this DetailTransaksiController */
/* @var $model DetailTransaksi */

$this->breadcrumbs=array(
	'Detail Transaksis'=>array('index'),
	$model->id_detail_transaksi=>array('view','id'=>$model->id_detail_transaksi),
	'Edit',
	);

$this->pageTitle='Edit DetailTransaksi';
?>

<?php echo $this->renderPartial('_form', array('model'=>$model,'model2'=>$model2)); ?>