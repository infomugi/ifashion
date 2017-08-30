<?php
/* @var $this DetailTransaksiController */
/* @var $model DetailTransaksi */

$this->breadcrumbs=array(
	'Detail Transaksis'=>array('index'),
	$model->id_detail_transaksi,
	);

$ReturTransaksi=new CActiveDataProvider('ReturTransaksi', array(
	'criteria'=>array(
		'condition'=>'detail_transaksi_id = '.$model->id_detail_transaksi,
		'order'=>'tanggal DESC'
		)
	));

$this->pageTitle='Detail Transaksi';
?>

<?php
/* @var $this TransaksiController */
/* @var $model Transaksi */

$this->breadcrumbs=array(
	'Transaksis'=>array('outdex'),
	$model->transaksi_id,
	);

$detailtransaksi=new CActiveDataProvider('DetailTransaksi', array(
	'criteria'=>array(
		'condition'=>'transaksi_id = '.$model->transaksi_id,
		'order'=>'tanggal DESC'
		)
	));

$this->menu=array(
	array('label'=>'Tambah Detail Barang','url'=>array('detailtransaksi/adddetail')),
	array('label'=>'Tambah','url'=>array('outbarang')),
	array('label'=>'Ubah Barang','url'=>array('update','id'=>$model->transaksi_id)),
	array('label'=>'Hapus Barang','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->transaksi_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Kelola Barang','url'=>array('out')),
	);

$this->pageTitle='Detail Transaksi';
?>

<HR>
	<?php echo CHtml::link('Tambah Detail Barang',
		array('detailtransaksi/addout', 'id'=>$model->transaksi_id),
		array('class' => 'btn btn-success btn-flat','title'=>'Add Detail Barang'));
		?>
		<?php echo CHtml::link('Laporan Barang',
			array('returtransaksi/create', 'tid'=>$model->transaksi_id,'dtid'=>$model->id_detail_transaksi,'item'=>$model->kode_barang,'ktrs'=>$model->Transaksi->kode_transaksi,'tgl'=>$model->Transaksi->tanggal),
			array('class' => 'btn btn-warning btn-flat','title'=>'Lapor Barang'));
			?>		
			<?php echo CHtml::link('Tambah Transaksi',
				array('outbarang'),
				array('class' => 'btn btn-primary btn-flat','title'=>'Add Transaksi Barang Keluar'));
				?>
				<?php echo CHtml::link('Kelola',
					array('out'),
					array('class' => 'btn btn-primary btn-flat', 'title'=>'List Transaksi'));
					?>
					<?php echo CHtml::link('Ubah', 
						array('update', 'id'=>$model->transaksi_id,
							), array('class' => 'btn btn-outfo btn-flat', 'title'=>'Edit Transaksi'));
							?>
							<?php echo CHtml::link('Hapus', 
								array('delete', 'id'=>$model->transaksi_id,
									),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Transaksi'));
									?>

									<HR>


										<h3>Data Barang #<?php echo $model->Barang->nama_barang; ?></h3>

										<?php $this->widget('zii.widgets.CDetailView', array(
											'data'=>$model,
											'htmlOptions'=>array("class"=>"table"),
											'attributes'=>array(
												'tanggal',

												array(
													'label'=>'Kode Barang',
													'value'=>$model->Barang->kode_barang,
													),							
												array(
													'label'=>'Nama Barang',
													'value'=>$model->Barang->nama_barang,
													),
												array(
													'label'=>'Stok (Gudang)',
													'value'=>$model->Barang->stok,
													),

												'jumlah',

												),
												)); ?>


												<h3>Transaksi #<?php echo $model->Transaksi->kode_transaksi; ?></h3>
												<?php $this->widget('zii.widgets.CDetailView', array(
													'data'=>$model,
													'htmlOptions'=>array("class"=>"table"),
													'attributes'=>array(
														'id_detail_transaksi',
														array(
															'label'=>'Kode Transaksi',
															'value'=>$model->Transaksi->kode_transaksi,
															),	
														array(
															'label'=>'Tanggal Transaksi',
															'value'=>$model->Transaksi->tanggal,
															),																							
														),
														)); ?>

														<h3>Laporan Barang #<?php echo $model->Transaksi->kode_transaksi; ?></h3>		
														<?php $this->widget('bootstrap.widgets.TbGridView',array(
															'id'=>'retur-transaksi-grid',
															'dataProvider'=>$ReturTransaksi,
															// 'filter'=>$model,
															'columns'=>array(
																array(
																	'header'=>'No',
																	'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
																	'htmlOptions'=>array('width'=>'10px', 
																		'style' => 'text-align: center;')),
																'tanggal',
																'kode_barang',
																'type',
																'jumlah',

																array(
																	'name'=>'status',
																	'value'=>'ReturTransaksi::model()->status($data->status)',
																	),

																array(
																	'header'=>'Lihat',
																	'class'=>'bootstrap.widgets.TbButtonColumn',
																	'template'=>'{view}',
																	'buttons'=>array(
																		'view'=>
																		array(
																			'url'=>'Yii::app()->createUrl("returtransaksi/view", array("id"=>$data->id_retur_transaksi))',
																			),
																		),
																	),
																),
																)); ?>


<STYLE>
	th{width:150px;}
</STYLE>

