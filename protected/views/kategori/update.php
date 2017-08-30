<?php
$this->breadcrumbs=array(
	'Kategoris'=>array('index'),
	$model->id_kategori=>array('view','id'=>$model->id_kategori),
	'Update',
);

$this->menu=array(
	array('label'=>'Tambah Kategori','url'=>array('create')),
	array('label'=>'Kelola Kategori','url'=>array('admin')),
);
?>

<h3>Ubah Kategori <?php echo $model->nama_kategori; ?></h3>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>