<?php
/* @var $this TransaksiController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Barang Masuk',
	);
$this->menu=array(
	array('label'=>'Tambah Barang Masuk','url'=>array('addbarang')),
	array('label'=>'Kelola Supplier','url'=>array('supplier/admin')),
	);

$this->pageTitle='Barang Masuk';
?>


<h3>Kelola Barang Masuk</h3>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'transaksi-grid',
	'dataProvider'=>$dataProvider,
						//'filter'=>$model,
	'itemsCssClass' => 'table-responsive table table-striped table-hover table-vcenter',
	'columns'=>array(

		array(
			'header'=>'No',
			'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
			'htmlOptions'=>array('width'=>'10px', 
				'style' => 'text-align: center;')),

		'tanggal',
		'kode_transaksi',
		'status',

		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{view}{delete}',
			'buttons'=>array(
				'view'=>
				array(
					'url'=>'Yii::app()->createUrl("Transaksi/viewin", array("id"=>$data->id_transaksi))',
					),
				),
			),
		),
		)); ?>