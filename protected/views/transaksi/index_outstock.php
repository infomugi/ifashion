<?php
/* @var $this TransaksiController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Penjualan',
	);
$this->menu=array(
	array('label'=>'Penjualan Baru','url'=>array('outbarang')),
	array('label'=>'Kelola Pelanggan','url'=>array('pelanggan/admin')),
	);
$this->pageTitle='Penjualan';
?>



<h3>Kelola Penjualan</h3>

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
		array('name'=>'total','value'=>'Transaksi::model()->rupiah($data->total)'),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{view}{delete}',
			'buttons'=>array(
				'view'=>
				array(
					'url'=>'Yii::app()->createUrl("Transaksi/viewout", array("id"=>$data->id_transaksi))',
					),
				),
			),
		),
		)); ?>


