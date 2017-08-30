<?php
$this->breadcrumbs=array(
	'Petugases'=>array('index'),
	$model->kode_petugas=>array('view','id'=>$model->kode_petugas),
	'Update',
);

$this->menu=array(
	array('label'=>'Kelola Petugas','url'=>array('admin')),
);
?>

<h1>Ubah Password </h1>

<?php echo $this->renderPartial('_formpass',array('model'=>$model)); ?>