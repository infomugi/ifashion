<?php
/* @var $this UkuranController */
/* @var $model Ukuran */
$this->pageTitle='Tambah Ukuran';

$this->menu=array(
	array('label'=>'Daftar Ukuran', 'url'=>array('index')),
	array('label'=>'Kelola Ukuran', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>