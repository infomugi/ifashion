<?php
$this->breadcrumbs=array(
	'Kategoris'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Kelola Kategori','url'=>array('admin')),
);
?>

<h3>Tambah Kategori</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>