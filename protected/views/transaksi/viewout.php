<?php
/* @var $this TransaksiController */
/* @var $model Transaksi */

function terbilang($satuan){
	$huruf = array ("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh","sebelas");
	if ($satuan < 12)
		return " ".$huruf[$satuan];
	elseif ($satuan < 20)
		return terbilang($satuan - 10)." belas";
	elseif ($satuan < 100)
		return terbilang($satuan / 10)." puluh".terbilang($satuan % 10);
	elseif ($satuan < 200)
		return "seratus".terbilang($satuan - 100);
	elseif ($satuan < 1000)
		return terbilang($satuan / 100)." ratus".terbilang($satuan % 100);
	elseif ($satuan < 2000)
		return "seribu".terbilang($satuan - 1000); 
	elseif ($satuan < 1000000)
		return terbilang($satuan / 1000)." ribu".terbilang($satuan % 1000); 
	elseif ($satuan < 1000000000)
		return terbilang($satuan / 1000000)." juta".terbilang($satuan % 1000000); 
	elseif ($satuan >= 1000000000)
		echo "Angka yang Anda masukkan terlalu besar";
}

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
	// array('label'=>'Ubah Penjualan','url'=>array('update','id'=>$model->id_transaksi)),
	// array('label'=>'Hapus Penjualan','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_transaksi),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Penjualan Baru','url'=>array('outbarang')),
	array('label'=>'Kelola Penjualan','url'=>array('out')),
	array('label'=>'Cetak Faktur','url'=>array('printout','id'=>$model->id_transaksi)),
	);

$this->pageTitle='Detail Transaksi';

if($model->status=="Verifikasi"):
	?>


<div class="row-fluid">
	<div class="span6">
		<h3>Petugas #<?php echo $model->petugas_id; ?></h3>

		<?php 

		$this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'htmlOptions'=>array("class"=>"table"),
			'attributes'=>array(
				'petugas_id',
				'petugas_by',
				),
			)); 
			?>	
		</div>
		<div class="span6">
			<h3>Nominal</h3>
			<?php $this->widget('zii.widgets.CDetailView', array(
				'data'=>$model,
				'htmlOptions'=>array("class"=>"table"),
				'attributes'=>array(
					array('name'=>'total','value'=>Transaksi::model()->rupiah($model->total)),
					// 'pembayaran',
					),
					)); ?>
				</div>

			</div>

			<?php

			endif;
			?>								

			<div class="row-fluid">
				<div class="span6">
					<h1>Penjualan #<?php echo $model->kode_transaksi; ?>
						
						<?php 
						if($model->status!="Verifikasi"):
							echo CHtml::link('Edit Penjualan',
								array('transaksi/update', 'id'=>$model->id_transaksi),
								array('class' => 'btn btn-success pull-right','title'=>'Edit Pelanggan'));
						endif;
						?>

					</h1>
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

							<h1>
								Pelanggan

								<?php 
								if($model->status!="Verifikasi"):
									echo CHtml::link('Edit Pelanggan',
										array('pelanggan/update', 'id'=>$model->pelanggan_id),
										array('class' => 'btn btn-success pull-right','title'=>'Edit Pelanggan'));
								endif;
								?>

							</h1>



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


							<?php 
							if($model->status!="Verifikasi"):
								echo CHtml::link('Tambah Barang',
									array('detailtransaksi/addout', 'id'=>$model->id_transaksi),
									array('class' => 'btn btn-success pull-right','title'=>'Cari Barang'));
							endif;
							?>

							<h1>Detail Penjualan</h1>
							
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
										'value'=>'Transaksi::model()->rupiah($data->Barang->harga)',
										),


									array(
										'header'=>'QTY',
										'value'=>'$data->jumlah',
										),

									array(
										'header'=>'Subtotal',
										'value'=>'Transaksi::model()->rupiah($data->Barang->harga * $data->jumlah)',
										),

									array(
										'class'=>'CButtonColumn',
										'template'=>'{view}{update}{delete}',
										'buttons'=>array(
											'view'=>
											array(
												'visible'=>'$data->Transaksi->status=="Verifikasi"',
												'url'=>'Yii::app()->createUrl("detailtransaksi/view", array("id"=>$data->id_detail_transaksi))',
												),
											'update'=>
											array(
												'visible'=>'$data->Transaksi->status!="Verifikasi"',
												'url'=>'Yii::app()->createUrl("detailtransaksi/update", array("id"=>$data->id_detail_transaksi))',
												),
											'delete'=>
											array(
												'visible'=>'$data->Transaksi->status!="Verifikasi"',
												'url'=>'Yii::app()->createUrl("detailtransaksi/delete", array("id"=>$data->id_detail_transaksi))',
												),
											),
										),
									),
									)); ?>

									<?php if($model->pelanggan_id!=1): ?>
										<div class="alert alert-warning">Member Discount Rp. 1000,- Per Item. ( Grand Total Sebelum Discount <?php echo Transaksi::model()->rupiah(Transaksi::model()->grandTotal($model->id_transaksi)); ?> )</div>
									<?php endif; ?>

									<?php if(Transaksi::model()->grandTotal($model->id_transaksi)!=0): ?>

										<div class="row-fluid">
											<?php if($model->pelanggan_id==1){ ?>

												<div class="span4">
													<h3 class="text-success">Total <?php echo Transaksi::model()->rupiah(Transaksi::model()->grandTotal($model->id_transaksi)); ?></h3>
													<small><span class="text-primary"><b><?php echo ucwords(terbilang(Transaksi::model()->grandTotal($model->id_transaksi))); ?></b></span></small>

													<h3 style="display:none" class="text-warning"><input type="text" id="total" name="total" value="<?php echo Transaksi::model()->grandTotal($model->id_transaksi); ?>" disabled="true" placeholder="Total Rp." class="form-control form-lg"></h3>
												</div>

												<?php }else{ ?>

													<div class="span4">
														<h3 class="text-success">Total <?php echo Transaksi::model()->rupiah(Transaksi::model()->grandTotalDiscount($model->id_transaksi)); ?></h3>
														<small><span class="text-primary"><b><?php echo ucwords(terbilang(Transaksi::model()->grandTotalDiscount($model->id_transaksi))); ?></b></span></small>

														<h3 style="display:none" class="text-warning"><input type="text" id="total" name="total" value="<?php echo Transaksi::model()->grandTotalDiscount($model->id_transaksi); ?>" placeholder="Total Rp." class="form-control form-lg"></h3>
													</div>

													<?php } ?>

													<div class="span3">
														<?php if($model->status!="Verifikasi"): ?>
															<h3 class="text-warning" id="kembali">Kembali Rp. 0,-</h3>
														<?php endif; ?>
													</div>

													<div class="span3">
														<?php if($model->status!="Verifikasi"): ?>
															<h3 class="text-warning"><input type="text" id="bayar" name="bayar" placeholder="Bayar Rp." class="form-control form-lg"></h3>
														<?php endif; ?>
													</div>

													<div class="span2">
														<h3 class="text-warning">
															<?php 
															if($model->status!="Verifikasi"){
																echo CHtml::link('Bayar', 
																	array('verifikasi', 'id'=>$model->id_transaksi,
																		), array('class' => 'btn btn-warning btn-lg pull-right', 'title'=>'Bayar Transaksi'));
															}else{
																echo CHtml::link('Print Faktur', 
																	array('printout','id'=>$model->id_transaksi,
																		), array('class' => 'btn btn-success btn-lg pull-right', 'title'=>'Cetak Faktur Transaksi Penjualan'));
															}

															?>
														</h3>

													</div>
												</div>

											<?php endif; ?>





											<STYLE>
												th{width:150px;}
												.navbar-inverse .navbar-inner, div.portlet-decoration{
													background-color: #41bb19;
												}

												a {
													color: #41bb19; 
												}

											</STYLE>

