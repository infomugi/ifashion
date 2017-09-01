<?php
/* @var $this TransaksiController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Barang Retur',
	);
$this->menu=array(
	array('label'=>'Tambah Barang Retur','url'=>array('returbarang')),
	);
$this->pageTitle='Barang Retur';
?>


<h3>Kelola Barang Retur</h3>

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
		'jenis_transaksi',
		'status',

		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{view}{delete}',
			'buttons'=>array(
				'view'=>
				array(
					'url'=>'Yii::app()->createUrl("Transaksi/viewretur", array("id"=>$data->id_transaksi))',
					),
				),
			),
		),
		)); ?>


