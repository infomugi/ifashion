<?php
$this->breadcrumbs=array(
	'Transaksis'=>array('index'),
	'Tambah',
);

$this->menu=array(
	array('label'=>'Kelola Barang Masuk','url'=>array('in')),
	array('label'=>'Kelola Penjualan','url'=>array('out')),
	array('label'=>'Kelola Barang ','url'=>array('barang/admin')),
	array('label'=>'Kelola Kategori ','url'=>array('kategori/admin')),
);
?>

<h3 class="alert alert-success">Barang Masuk</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>