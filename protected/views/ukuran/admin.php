<?php
/* @var $this UkuranController */
/* @var $model Ukuran */
$this->pageTitle='Kelola Ukuran';

$this->menu=array(
	array('label'=>'Tambah Ukuran', 'url'=>array('create')),
	array('label'=>'Daftar Ukuran', 'url'=>array('index')),
	);
	?>
	<span class="hidden-xs">

		<?php echo CHtml::link('Tambah Ukuran',
			array('create'),
			array('class' => 'btn btn-primary btn-flat'));
			?>
			<?php echo CHtml::link('Daftar Ukuran',
				array('index'),
				array('class' => 'btn btn-primary btn-flat'));
				?>

			</span>	

			<HR>

				<?php $this->widget('zii.widgets.grid.CGridView', array(
					'id'=>'ukuran-grid',
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
