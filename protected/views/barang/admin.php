<?php
$this->breadcrumbs=array(
	'Barangs'=>array('index'),
	'Manage',
	);

$this->menu=array(
	array('label'=>'Tambah Barang','url'=>array('create')),
	);

Yii::app()->clientScript->registerScript('search', "
	$('.search-button').click(function(){
		$('.search-form').toggle();
		return false;
	});
	$('.search-form form').submit(function(){
		$.fn.yiiGridView.update('barang-grid', {
			data: $(this).serialize()
		});
		return false;
	});
	");
	?>

	<h3>Kelola Data Barang</h3>

	<hr/>

	<?php $this->widget('bootstrap.widgets.TbGridView',array(
		'id'=>'barang-grid',
		'dataProvider'=>$model->search(),
		'filter'=>$model,
		'columns'=>array(

			array(
				'header'=>'No',
				'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
				'htmlOptions'=>array('width'=>'10px', 
					'style' => 'text-align: center;')),

			array(
				'type' => 'raw',
				'value' => 'CHtml::image(Yii::app()->baseUrl ."/foto_produk/"."$data->gambar","", array("width"=>100, "height"=>100))',
				),

			array(
				'header'=>'Kategori',
				'value'=>'$data->Kategori->nama_kategori',
				),

			'nama_barang',
			'stok',
			'stok_retur',
			array(
				'class'=>'bootstrap.widgets.TbButtonColumn',
				),
			),
			)); ?>
