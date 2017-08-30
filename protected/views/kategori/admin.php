<?php
$this->breadcrumbs=array(
	'Kategoris'=>array('index'),
	'Manage',
	);

$this->menu=array(
	array('label'=>'Tambah Kategori','url'=>array('create')),
	array('label'=>'Kelola Warna','url'=>array('warna/admin')),
	array('label'=>'Kelola Ukuran','url'=>array('ukuran/admin')),
	);
	?>

	<h3>Kelola Kategori Barang</h3><hr/>

	<?php $this->widget('bootstrap.widgets.TbGridView',array(
		'id'=>'kategori-grid',
		'dataProvider'=>$model->search(),
		'filter'=>$model,
		'columns'=>array(
			array(
				'header'=>'No',
				'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
				'htmlOptions'=>array('width'=>'10px', 
					'style' => 'text-align: center;')),
			'nama_kategori',
			array(
				'class'=>'bootstrap.widgets.TbButtonColumn',
				),
			),
			)); ?>
