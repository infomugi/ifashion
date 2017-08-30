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

$this->menu=array(
	array('label'=>'Ubah Penjualan','url'=>array('update','id'=>$model->id_transaksi)),
	array('label'=>'Hapus Penjualan','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_transaksi),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Kelola Penjualan','url'=>array('out')),
	array('label'=>'Cetak Faktur','url'=>array('printout','id'=>$model->id_transaksi)),
	);

$this->pageTitle='Detail Transaksi';
?>

<h3>Petugas #<?php echo $model->petugas_id; ?>
	

	<?php echo CHtml::link('Verifikasi Penjualan', 
		array('verifikasi', 'id'=>$model->id_transaksi,
			), array('class' => 'btn btn-warning pull-right', 'title'=>'Edit Transaksi'));
			?>

		</h3>

		<?php $this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'htmlOptions'=>array("class"=>"table"),
			'attributes'=>array(
				'petugas_id',
				'petugas_by',
				),
				)); ?>								

				<div class="row-fluid">
					<div class="span6">
						<h3>Kode #<?php echo $model->kode_transaksi; ?></h3>
						<?php $this->widget('zii.widgets.CDetailView', array(
							'data'=>$model,
							'htmlOptions'=>array("class"=>"table"),
							'attributes'=>array(
								'id_transaksi',
								'tanggal',
								'jenis_transaksi',
								'status',
								),
								)); ?>
							</div>

							<div class="span6">

								<h3>
									Pelanggan

									<?php echo CHtml::link('Edit Pelanggan',
										array('pelanggan/update', 'id'=>$model->pelanggan_id),
										array('class' => 'btn btn-success pull-right','title'=>'Edit Pelanggan'));
										?>

									</h3>



									<?php $this->widget('zii.widgets.CDetailView', array(
										'data'=>$model,
										'htmlOptions'=>array("class"=>"table"),
										'attributes'=>array(
											array('label'=>'Nama Pelanggan','value'=>$model->Pelanggan->nama),
											array('label'=>'Alamat','value'=>$model->Pelanggan->alamat),
											array('label'=>'Kontak','value'=>$model->Pelanggan->kontak),
											array('label'=>'email','value'=>$model->Pelanggan->email),
											),
											)); ?>
										</div>
									</div>


									<?php echo CHtml::link('Tambah Barang',
										array('detailtransaksi/addout', 'id'=>$model->id_transaksi),
										array('class' => 'btn btn-success pull-right','title'=>'Cari Barang'));
										?>

										<h3>Detail Penjualan</h3>
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

											// 'tanggal',

												array(
													'header'=>'Nama Barang',
													'value'=>'$data->Barang->kode_barang',
													),

												array(
													'header'=>'Nama Barang',
													'value'=>'$data->Barang->nama_barang',
													),

												array(
													'header'=>'Harga',
													'value'=>'$data->Barang->harga',
													),


												array(
													'header'=>'QTY',
													'value'=>'$data->jumlah',
													),

												array(
													'header'=>'Sisa Stok',
													'value'=>'$data->Barang->harga * $data->jumlah',
													),

												array(
													'class'=>'CButtonColumn',
													'template'=>'{update}{delete}',
													'buttons'=>array(
														'update'=>
														array(
															'url'=>'Yii::app()->createUrl("detailtransaksi/update", array("id"=>$data->id_detail_transaksi))',
															),
														'delete'=>
														array(
															'url'=>'Yii::app()->createUrl("detailtransaksi/delete", array("id"=>$data->id_detail_transaksi))',
															),
														),
													),
												),
												)); ?>

										<STYLE>
											th{width:150px;}
										</STYLE>

