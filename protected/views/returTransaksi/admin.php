<?php
/* @var $this ReturTransaksiController */
/* @var $model ReturTransaksi */
?>

<h2 class="header">Manage <b>Retur Transaksis</b><span class="header-line"></span></h2>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'retur-transaksi-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'itemsCssClass' => 'table table-striped table-hover',
	'columns'=>array(
	array(
		'header'=>'No',
		'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
		'htmlOptions'=>array('width'=>'10px', 
		'style' => 'text-align: center;color:#FFF;background:#307164;')),
		'id_retur_transaksi',
		'tanggal',
		'kode_barang',
		'transaksi_id',
		'detail_transaksi_id',
		'type',
		/*
		'jumlah',
		'status',
		'petugas_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
