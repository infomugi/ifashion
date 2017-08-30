<?php
/* @var $this SupplierController */
/* @var $model Supplier */
$this->pageTitle='Tambah Supplier';

$this->menu=array(
	array('label'=>'Daftar Supplier', 'url'=>array('index')),
	array('label'=>'Kelola Supplier', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>