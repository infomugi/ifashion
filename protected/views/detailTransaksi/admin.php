<?php
/* @var $this DetailTransaksiController */
/* @var $model DetailTransaksi */

$this->breadcrumbs=array(
	'Detail Transaksis'=>array('index'),
	'Manage',
	);

$this->pageTitle='Manage DetailTransaksi';
?>

<HR>
	<?php echo CHtml::link('Tambah Transaksi Masuk',
		array('transaksi/addbarang'),
		array('class' => 'btn btn-primary btn-flat','title'=>'Add Barang Masuk'));
		?>

		<?php echo CHtml::link('Kelola Barang Masuk',
			array('transaksi/in'),
			array('class' => 'btn btn-primary btn-flat', 'title'=>'List Transaksi'));
			?>

			<?php echo CHtml::link('Tambah Transaksi Keluar',
				array('transaksi/outbarang'),
				array('class' => 'btn btn-primary btn-flat','title'=>'Add Barang Masuk'));
				?>

				<?php echo CHtml::link('Kelola Barang Masuk',
					array('transaksi/out'),
					array('class' => 'btn btn-primary btn-flat', 'title'=>'List Transaksi'));
					?>


					<HR>

						<?php $this->widget('zii.widgets.grid.CGridView', array(
							'id'=>'detail-transaksi-grid',
							'dataProvider'=>$model->search(),
							// 'filter'=>$model,
							'itemsCssClass' => 'table-responsive table table-striped table-hover table-vcenter',
							'columns'=>array(

								array(
									'header'=>'No',
									'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
									'htmlOptions'=>array('width'=>'10px', 
										'style' => 'text-align: center;')),

								'tanggal',

								array(
									'header'=>'Kode Transaksi',
									'value'=>'$data->Transaksi->kode_transaksi',
									),		

								array(
									'header'=>'Kode Barang',
									'value'=>'$data->Barang->kode_barang',
									),

								array(
									'header'=>'Nama Barang',
									'value'=>'$data->Barang->nama_barang',
									),

								array(
									'header'=>'Stok (Gudang)',
									'value'=>'$data->Barang->stok',
									),																		

								'jumlah',

								array(
									'class'=>'CButtonColumn',
									'template'=>'{view}',
									'buttons'=>array(
										'view'=>
										array(
											'url'=>'Yii::app()->createUrl("DetailTransaksi/view", array("id"=>$data->id_detail_transaksi))',
											),
										),
									),
								),
)); ?>