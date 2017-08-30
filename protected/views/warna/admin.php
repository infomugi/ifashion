<?php
/* @var $this WarnaController */
/* @var $model Warna */
$this->pageTitle='Kelola Warna';

$this->menu=array(
	array('label'=>'Tambah Warna', 'url'=>array('create')),
	array('label'=>'Daftar Warna', 'url'=>array('index')),
	);
	?>
	<span class="hidden-xs">

		<?php echo CHtml::link('Tambah Warna',
			array('create'),
			array('class' => 'btn btn-primary btn-flat'));
			?>
			<?php echo CHtml::link('Daftar Warna',
				array('index'),
				array('class' => 'btn btn-primary btn-flat'));
				?>

			</span>	

			<HR>

				<?php $this->widget('zii.widgets.grid.CGridView', array(
					'id'=>'warna-grid',
					'dataProvider'=>$model->search(),
					'filter'=>$model,
					'itemsCssClass' => 'table table-striped table-hover',
					'columns'=>array(
						array(
							'header'=>'No',
							'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
							),
						'nama',
						array(
							'class'=>'CButtonColumn',
							),
						),
						)); ?>
