<?php
/* @var $this ReturTransaksiController */
/* @var $model ReturTransaksi */

$this->menu=array(	
	array('label'=>'Print','url'=>array('printin','id'=>$model->id_retur_transaksi)),
	);
	?>

	<h2 class="header">Laporan Retur <b>#<?php echo $model->id_retur_transaksi; ?></b><span class="header-line"></span></h2>

	<?php $this->widget('zii.widgets.CDetailView', array(
		'data'=>$model,
		'htmlOptions'=>array("class"=>"table "),
		'attributes'=>array(
			'tanggal',
			array(
				'label'=>'Tanggal Transaksi',
				'value'=>$model->Transaksi->tanggal,
				),	
			array(
				'label'=>'Kode Transaksi',
				'value'=>$model->Transaksi->kode_transaksi,
				),	
			array(
				'label'=>'Status Laporan',
				'value'=>ReturTransaksi::model()->status($model->status),
				),
			array(
				'label'=>'Petugas Pencatat',
				'value'=>$model->Petugas->username
				),
			),
			)); ?>

			<h2 class="header">Barang <b>#<?php echo $model->Barang->kode_barang; ?></b><span class="header-line"></span></h2>
			<?php $this->widget('zii.widgets.CDetailView', array(
				'data'=>$model,
				'htmlOptions'=>array("class"=>"table "),
				'attributes'=>array(

					array(
						'label'=>'Kode Barang',
						'value'=>$model->Barang->kode_barang
						),

					array(
						'label'=>'Nama Barang',
						'value'=>$model->Barang->nama_barang
						),


					array(
						'label'=>'Stok',
						'value'=>$model->Barang->stok
						),

					array(
						'label'=>'Stok Retur',
						'value'=>$model->Barang->stok_retur
						),


					array(
						'label'=>'Keterangan',
						'value'=>$model->Barang->keterangan_produk
						),

					'type',
					'jumlah',
					),
					)); ?>

			<?php if($model->status==0){ ?>

				<?php echo CHtml::link('Verifikasi Retur',
					array('verifikasi', 'id'=>$model->id_retur_transaksi),
					array('class' => 'btn btn-warning pull-right btn-flat','title'=>'Verifikasi Retur'));
				?>

				<BR>
					<BR>

						<?php }else{ ?>

							<H1>
								<div class="alert alert-warning">Laporan : <?php echo $model->type; ?> Terverifikasi</div>
							</H1>


							<?php echo CHtml::link('Kembalikan ke Supplier',
								array('supplier', 'id'=>$model->id_retur_transaksi),
								array('class' => 'btn btn-success pull-right btn-flat','title'=>'Verifikasi Retur'));
							?>

							<BR>
								<BR>

									<?php } ?>
									<STYLE>
										th{width:150px;}
									</STYLE>
