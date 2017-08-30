<?php
/* @var $this DetailTransaksiController */
/* @var $data DetailTransaksi */
?>

<div class="col-xs-12 col-md-6 col-lg-6">
	<!-- Default box -->
	<div class="box box-solid">
		<div class="box-header">
			<h3 class="box-title">

				<?php echo CHtml::link(CHtml::encode($data->id_detail_transaksi), array('view', 'id'=>$data->id_detail_transaksi)); ?>
				<br />

				
			</div>
			<div class="box-body">

				<?php $this->widget('zii.widgets.CDetailView', array(
					'data'=>$data,
					'htmlOptions'=>array("class"=>"table"),
					'attributes'=>array(
						'id_detail_transaksi',
						'tanggal',
						'transaksi_id',
						'jumlah',
						'petugas_id',
						),
						)); ?>

					</div><!-- /.box-body -->
				</div><!-- /.box -->
			</div>
