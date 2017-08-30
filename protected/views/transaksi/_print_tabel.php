<?php
/* @var $this TransaksiController */
/* @var $data Transaksi */

$detailtransaksi=new CActiveDataProvider('DetailTransaksi', array(
	'criteria'=>array(
		'condition'=>'transaksi_id = '.$data->id_transaksi,
		'order'=>'tanggal DESC'
		)
	));
?>

<div class="col-xs-6">
	<!-- Default box -->
	<div class="box box-solid">
		<div class="box-header">
			<h3 class="box-title">
				<?php echo CHtml::encode($data->kode_transaksi); ?>
			</div>
			<div class="box-body">
				<?php $this->widget('zii.widgets.grid.CGridView', array(
					'id'=>'detail-transaksi-grid',
					'dataProvider'=>$detailtransaksi,
					'summaryText'=>'',
					'itemsCssClass' => 'table-responsive table table-vcenter',
					'columns'=>array(

				array(
					'header'=>'No',
					'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
					'htmlOptions'=>array('width'=>'10px', 
						'style' => 'text-align: center;')),

				array(
					'header'=>'Tanggal',
					'value'=>'$data->tanggal'
					),

				array(
					'header'=>'Kode Barang',
					'value'=>'$data->kode_barang'
					),

				array(
					'header'=>'Nama Barang',
					'value'=>'$data->Barang->nama_barang',
					),

				array(
					'header'=>'Sisa Stok',
					'value'=>'$data->Barang->stok',
					),

				array(
					'header'=>'Tanggal',
					'value'=>'$data->jumlah'
					),				

						),
						)); ?>

					</div><!-- /.box-body -->
				</div><!-- /.box -->

					</div>
