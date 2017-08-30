<?php
/* @var $this DetailTransaksiController */
/* @var $data DetailTransaksi */
?>

<div class="col-xs-12 col-md-6 col-lg-6">
	<!-- Default box -->
	<div class="box box-solid">
		<div class="box-header">
			<h3 class="box-title">

				<?php echo CHtml::link(CHtml::encode($data->kode_barang . ' - ' . $data->nama_barang), array('view', 'id'=>$data->kode_barang)); ?>
				<br />

				
			</div>
			<div class="box-body">

				<?php $this->widget('bootstrap.widgets.TbDetailView',array(
					'data'=>$data,
					'attributes'=>array(
						'kode_barang',
						'nama_barang',
						'stok',
						'keterangan_produk',
						array(
							'name'=>'kategori',
							'value'=>$data->Kategori->nama_kategori,
							),			
						),
						)); ?>

				<?php echo CHtml::link('Update', 
					array('update', 'id'=>$data->kode_barang,
						), array('class' => 'btn btn-warning btn-flat', 'title'=>'Edit Transaksi'));
						?>


					</div><!-- /.box-body -->
				</div><!-- /.box -->
			</div>
