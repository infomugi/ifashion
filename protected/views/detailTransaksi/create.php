<?php
$this->breadcrumbs=array(
	'Transaksis'=>array('index'),
	'Create',
	);

$this->menu=array(
	array('label'=>'Kelola Transaksi','url'=>array('admin')),
	);
	?>

	<h3 class="alert alert-warning">Pencarian Barang</h3>

	<?php echo $this->renderPartial('_form', array('model'=>$model,'model2'=>$model2)); ?>