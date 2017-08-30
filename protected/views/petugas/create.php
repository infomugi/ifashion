<?php
/* @var $this PetugasController */
/* @var $model Petugas */
$this->pageTitle='Tambah Petugas';

$this->menu=array(
	array('label'=>'Daftar Petugas', 'url'=>array('index')),
	array('label'=>'Kelola Petugas', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>