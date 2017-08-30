<?php
/* @var $this PelangganController */
/* @var $model Pelanggan */
$this->pageTitle='Detail Pelanggan';

$this->menu=array(
	array('label'=>'Daftar Pelanggan', 'url'=>array('index')),
	array('label'=>'Kelola Pelanggan', 'url'=>array('admin')),
	);
	?>
	<?php echo CHtml::link('Tambah',
		array('create'),
		array('class' => 'btn btn-primary btn-flat','title'=>'Add Pelanggan'));
		?>
		<?php echo CHtml::link('Kelola',
			array('admin'),
			array('class' => 'btn btn-primary btn-flat','title'=>'Manage Pelanggan'));
			?>
			<?php echo CHtml::link('Edit', 
				array('update', 'id'=>$model->id_pelanggan,
					), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Pelanggan'));
					?>
					<?php echo CHtml::link('Hapus', 
						array('delete', 'id'=>$model->id_pelanggan,
							),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Pelanggan'));
							?>

							<HR>

								<?php $this->widget('zii.widgets.CDetailView', array(
									'data'=>$model,
									'htmlOptions'=>array("class"=>"table "),
									'attributes'=>array(
											// 'id_pelanggan',
										'tanggal',
										'nama',
										'alamat',
										'kontak',
										'email',
											// 'status',
										),
										)); ?>

								<STYLE>
									th{width:300px;}
								</STYLE>
