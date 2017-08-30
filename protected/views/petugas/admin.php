<?php
/* @var $this PetugasController */
/* @var $model Petugas */
$this->pageTitle='Kelola Petugas';

$this->menu=array(
	array('label'=>'Tambah Petugas', 'url'=>array('create')),
	array('label'=>'Daftar Petugas', 'url'=>array('index')),
	);
	?>
	<span class="hidden-xs">

		<?php echo CHtml::link('Tambah Petugas',
			array('create'),
			array('class' => 'btn btn-primary btn-flat'));
			?>
			<?php echo CHtml::link('Daftar Petugas',
				array('index'),
				array('class' => 'btn btn-primary btn-flat'));
				?>

			</span>	

			<HR>

				<?php $this->widget('zii.widgets.grid.CGridView', array(
					'id'=>'petugas-grid',
					'dataProvider'=>$model->search(),
					'filter'=>$model,
					'itemsCssClass' => 'table table-striped table-hover',
					'columns'=>array(
						array(
							'header'=>'No',
							'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
							),
						
						'username',
						'email',
						'level',

						array(
							'class'=>'CButtonColumn',
							),
						),
						)); ?>
