<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;

?>


<?php if(Yii::app()->user->record->level==1): ?>
	<center class="hidden-xs well">
		<?php echo CHtml::link('Transaksi Masuk',
			array('transaksi/addbarang'),
			array('class' => 'btn-large btn btn-success','title'=>'Add Barang Masuk'));
			?>

			<?php echo CHtml::link('Transaksi Penjualan',
				array('transaksi/outbarang'),
				array('class' => 'btn-large btn btn-warning','title'=>'Add Barang Keluar'));
				?>

				<?php echo CHtml::link('Retur',
					array('transaksi/returbarang'),
					array('class' => 'btn-large btn btn-danger','title'=>'Retur Transaksi'));
					?>

					<?php echo CHtml::link('Pelanggan',
						array('pelanggan/admin'),
						array('class' => 'btn-large btn btn-info', 'title'=>'Data Pelanggan'));
						?>

						<?php echo CHtml::link('Supplier',
							array('supplier/admin'),
							array('class' => 'btn-large btn btn-info', 'title'=>'Data Supplier'));
							?>

							<?php echo CHtml::link('Rekap Laporan',
								array('site/report'),
								array('class' => 'btn-large btn btn-inverse', 'title'=>'Laporan Periodik'));
								?>
							</center>

						<?php endif; ?>


						<div class="table-responsive">
							<h3>Persediaan Barang</h3>
							<?php $this->widget('bootstrap.widgets.TbGridView',array(
								'id'=>'barang-grid',
								'dataProvider'=>$model->search(),
								'itemsCssClass' => 'table-responsive table table-striped table-hover table-vcenter',
								'filter'=>$model,
								'columns'=>array(

									array(
										'header'=>'No',
										'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
										'htmlOptions'=>array('width'=>'10px', 
											'style' => 'text-align: center;')),

									array(
										'type' => 'raw',
										'value' => 'CHtml::image(Yii::app()->baseUrl ."/foto_produk/"."$data->gambar","", array("width"=>100, "height"=>100))',
										),

									array(
										'header'=>'Kategori',
										'value'=>'$data->Kategori->nama_kategori',
										),

									'nama_barang',
									'stok',

									array(
										'header'=>'Lihat',
										'class'=>'bootstrap.widgets.TbButtonColumn',
										'template'=>'{view}',
									// 'visible'=>Yii::app()->user->record->level==1,
										'buttons'=>array(
											'view'=>
											array(
												'url'=>'Yii::app()->createUrl("barang/view", array("id"=>$data->kode_barang))',
												),
											),
										),

									),
									)); ?>
								</div>