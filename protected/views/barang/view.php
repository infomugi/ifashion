<?php
$this->breadcrumbs=array(
	'Barangs'=>array('index'),
	$model->kode_barang,
	);

$detailtransaksi=new CActiveDataProvider('DetailTransaksi', array(
	'criteria'=>array(
		'condition'=>'kode_barang = "'.$model->id_barang.'"',
		'order'=>'tanggal DESC'
		)
	));

$this->menu=array(
	array('label'=>'Tambah Barang','url'=>array('create'),'visible'=>Yii::app()->user->record->level==1),
	array('label'=>'Ubah Barang','url'=>array('update','id'=>$model->id_barang),'visible'=>Yii::app()->user->record->level==1),
	array('label'=>'Hapus Barang','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_barang),'confirm'=>'Are you sure you want to delete this item?'),'visible'=>Yii::app()->user->record->level==1),
	array('label'=>'Kelola Barang','url'=>array('admin'),'visible'=>Yii::app()->user->record->level==1),
	);
	?>

	<h3>Detail Barang #<?php echo $model->nama_barang; ?></h3>

	<div class="row-fluid">
		<div class="span4">

			<img src='<?php echo Yii::app()->baseUrl."/file/produk/".$model->gambar; ?>' alt="Preview Prodak <?php echo $model->nama_barang; ?>" class="img-responsive" style="width: 220px;"/>
		</div>

		<div class="span8">
			<?php $this->widget('bootstrap.widgets.TbDetailView',array(
				'data'=>$model,
				'attributes'=>array(
					'kode_barang',
					'nama_barang',
					'stok',
					'stok_minimum',
					'harga_beli',
					'harga',
					'warna',
					'ukuran',
					'keterangan_produk',
					array(
						'name'=>'kategori',
						'value'=>$model->Kategori->nama_kategori,
						),			
					),
					)); ?>
				</div>
			</div>

			<?php if(Yii::app()->user->record->level==1): ?>
				<h3>Data Transaksi Barang #<?php echo $model->kode_barang; ?></h3><hr/>
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

						'tanggal',
						'kode_barang',

						array(
							'header'=>'Nama Barang',
							'value'=>'$data->Barang->nama_barang',
							),

						array(
							'header'=>'Sisa Stok',
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

					<?php endif; ?>
