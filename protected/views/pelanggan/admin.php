<?php
/* @var $this PelangganController */
/* @var $model Pelanggan */
$this->pageTitle='Kelola Pelanggan';

$this->menu=array(
	array('label'=>'Tambah Pelanggan', 'url'=>array('create')),
	array('label'=>'Daftar Pelanggan', 'url'=>array('index')),
	);
	?>
	<span class="hidden-xs">

		<?php echo CHtml::link('Tambah Pelanggan',
			array('create'),
			array('class' => 'btn btn-primary btn-flat'));
			?>

		</span>	

		<HR>

			<?php $this->widget('zii.widgets.grid.CGridView', array(
				'id'=>'pelanggan-grid',
				'dataProvider'=>$model->search(),
				'filter'=>$model,
				'itemsCssClass' => 'table table-striped table-hover',
				'columns'=>array(
					array(
						'header'=>'No',
						'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
						),

					'nama',
					'alamat',
					'kontak',
					'email',

					array(
						'class'=>'CButtonColumn',
						),
					),
					)); ?>
