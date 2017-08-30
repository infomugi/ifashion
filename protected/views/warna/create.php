<?php
/* @var $this WarnaController */
/* @var $model Warna */
$this->pageTitle='Tambah Warna';

$this->menu=array(
	array('label'=>'Daftar Warna', 'url'=>array('index')),
	array('label'=>'Kelola Warna', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>