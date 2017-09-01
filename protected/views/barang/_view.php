<?php
/* @var $this DetailTransaksiController */
/* @var $data DetailTransaksi */
?>

<div class="span12">
	<!-- Default box -->
	<div class="box box-solid">
		<div class="box-header">
			<h3 class="box-title">

				<?php echo CHtml::link(CHtml::encode($data->kode_barang . ' - ' . $data->nama_barang), array('view', 'id'=>$data->id_barang)); ?>
				<br />

				
			</div>
			<div class="box-body">
				<div class="row-fluid">
					<div class="span2">

						<img src='<?php echo Yii::app()->baseUrl."/file/produk/".$data->gambar; ?>' alt="Preview Prodak <?php echo $data->nama_barang; ?>" class="img-responsive" style="width: 120px;"/>
					</div>

					<div class="span10">

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
							array('update', 'id'=>$data->id_barang,
								), array('class' => 'btn btn-warning btn-flat', 'title'=>'Edit Transaksi'));
								?>
							</div>
						</div>



					</div><!-- /.box-body -->
				</div><!-- /.box -->
			</div>
