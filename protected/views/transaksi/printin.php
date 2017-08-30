<?php
/* @var $this TransaksiController */
/* @var $model Transaksi */

$this->breadcrumbs=array(
	'Transaksis'=>array('index'),
	$model->id_transaksi,
	);

$detailtransaksi=new CActiveDataProvider('DetailTransaksi', array(
	'criteria'=>array(
		'condition'=>'transaksi_id = '.$model->id_transaksi,
		'order'=>'tanggal DESC'
		)
	));

$this->pageTitle='Print - Barang Masuk #'.$model->kode_transaksi;
?>

		<h3>Barang Masuk #<?php echo $model->kode_transaksi; ?></h3>

		<?php $this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'htmlOptions'=>array("class"=>"table"),
			'attributes'=>array(
				'id_transaksi',
				'tanggal',
				'kode_transaksi',
				'jenis_transaksi',
				'status',
				),
				)); ?>

		<?php $this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'detail-transaksi-grid',
			'dataProvider'=>$detailtransaksi,
			'itemsCssClass' => 'table-responsive table table-striped table-hover table-vcenter',
			'columns'=>array(

				array(
					'header'=>'No',
					'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
					'htmlOptions'=>array('width'=>'10px', 
						'style' => 'text-align: center;')),

				array(
					'header'=>'Tanggal',
					'value'=>'$data->tanggal'
					),

				array(
					'header'=>'Kode Barang',
					'value'=>'$data->kode_barang'
					),

				array(
					'header'=>'Nama Barang',
					'value'=>'$data->Barang->nama_barang',
					),

				array(
					'header'=>'Sisa Stok',
					'value'=>'$data->Barang->stok',
					),

				array(
					'header'=>'Tanggal',
					'value'=>'$data->jumlah'
					),				


				),
				)); ?>

				<div class="footer pull-right">
					<p>Tanggal Cetak : <b><?php echo date('d-m-Y'); ?></b> - Oleh : <b><?php echo YII::app()->user->name; ?></b>
					
				</div>

		<STYLE>
			th{width:150px;}
		</STYLE>

