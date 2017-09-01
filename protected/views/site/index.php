<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;

?>




<div class="table-responsive well">
	<h3>Informasi Persediaan Barang - <?php echo YII::app()->name; ?></h3>
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
			'stok_minimum',

			array(
				'header'=>'Status',
				'value'=>'Barang::model()->check($data->stok,$data->stok_minimum)',
				),

			array(
				'header'=>'Lihat',
				'class'=>'bootstrap.widgets.TbButtonColumn',
				'template'=>'{view}',
									// 'visible'=>Yii::app()->user->record->level==1,
				'buttons'=>array(
					'view'=>
					array(
						'url'=>'Yii::app()->createUrl("barang/view", array("id"=>$data->id_barang))',
						),
					),
				),

			),
			)); ?>



			<?php if(Yii::app()->user->record->level==1): ?>
				<center>
					<?php echo CHtml::link('Barang Masuk',
						array('transaksi/addbarang'),
						array('class' => 'btn-large btn btn-info','title'=>'Add Barang Masuk'));
						?>

						<?php echo CHtml::link('Transaksi Penjualan',
							array('transaksi/outbarang'),
							array('class' => 'btn-large btn btn-success','title'=>'Add Barang Keluar'));
							?>

							<?php echo CHtml::link('Retur',
								array('transaksi/returbarang'),
								array('class' => 'btn-large btn btn-danger','title'=>'Retur Transaksi'));
								?>

								<?php echo CHtml::link('Pelanggan',
									array('pelanggan/admin'),
									array('class' => 'btn-large btn btn-primary', 'title'=>'Data Pelanggan'));
									?>

									<?php echo CHtml::link('Supplier',
										array('supplier/admin'),
										array('class' => 'btn-large btn btn-primary', 'title'=>'Data Supplier'));
										?>

										<?php echo CHtml::link('Rekap Laporan',
											array('site/report'),
											array('class' => 'btn-large btn btn-inverse', 'title'=>'Laporan Periodik'));
											?>
										</center>

									<?php endif; ?>