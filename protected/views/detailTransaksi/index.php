<?php
/* @var $this TransaksiController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Barang Masuk',
	);
$this->menu=array(
	array('label'=>'Kelola Barang Masuk','url'=>array('in')),
	array('label'=>'Kelola Barang Keluar','url'=>array('out')),
	array('label'=>'Kelola Barang ','url'=>array('barang/admin')),
	array('label'=>'Kelola Kategori ','url'=>array('kategori/admin')),
);

$this->pageTitle='Barang Masuk';
?>

<HR>

	<?php echo CHtml::link('Kelola Barang Masuk',
		array('index_instock'),
		array('class' => 'btn btn-primary btn-flat', 'title'=>'List Transaksi'));
		?>

			<?php echo CHtml::link('Kelola Barang Keluar',
		array('index_instock'),
		array('class' => 'btn btn-primary btn-flat', 'title'=>'List Transaksi'));
		?>

			<HR>

					<?php $this->widget('bootstrap.widgets.TbGridView',array(
						'id'=>'transaksi-grid',
						'dataProvider'=>$dataProvider,
						//'filter'=>$model,
						'itemsCssClass' => 'table-responsive table table-striped table-hover table-vcenter',
						'columns'=>array(

							array(
								'header'=>'No',
								'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
								'htmlOptions'=>array('width'=>'10px', 
									'style' => 'text-align: center;')),

							'tanggal',
							'transaksi_id',
							'jumlah',

							array(
								'class'=>'bootstrap.widgets.TbButtonColumn',
								'template'=>'{view}',
								'buttons'=>array(
									'view'=>
									array(
										'url'=>'Yii::app()->createUrl("Transaksi/view", array("id"=>$data->id_transaksi))',
										'options'=>array(
											'ajax'=>array(
												'type'=>'POST',
												'url'=>"js:$(this).attr('href')",
												'success'=>'function(data) { $("#viewModal .modal-body p").html(data); $("#viewModal").modal(); }'
												),
											),
										),
									),
								),
							),
							)); ?>



							<!-- Modal -->
							<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<!-- Popup Header -->
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title"><strong>View</strong> Transaksi</h4>
										</div>
										<!-- Popup Content -->
										<div class="modal-body">
											<p>Details</p>
										</div>
										<!-- Popup Footer -->
										<div class="modal-footer">
											<BR>
												<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</div>


