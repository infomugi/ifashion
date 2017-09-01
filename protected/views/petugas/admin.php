<?php
/* @var $this PetugasController */
/* @var $model Petugas */
$this->pageTitle='Kelola Petugas';

$this->menu=array(
	array('label'=>'Tambah Petugas', 'url'=>array('create')),
	);
	?>

	<h3>Kelola Petugas</h3>

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
