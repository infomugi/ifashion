<?php
/* @var $this SupplierController */
/* @var $model Supplier */
$this->pageTitle='Kelola Supplier';

$this->menu=array(
	array('label'=>'Tambah Supplier', 'url'=>array('create')),
	array('label'=>'Daftar Supplier', 'url'=>array('index')),
);
?>
	<span class="hidden-xs">

		<?php echo CHtml::link('Tambah Supplier',
 array('create'),
 array('class' => 'btn btn-primary btn-flat'));
 ?>
		<?php echo CHtml::link('Daftar Supplier',
 array('index'),
 array('class' => 'btn btn-primary btn-flat'));
 ?>

	</span>	

	<HR>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'supplier-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'itemsCssClass' => 'table table-striped table-hover',
	'columns'=>array(
	array(
		'header'=>'No',
		'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
		),
		'id_supplier',
		'tanggal',
		'nama',
		'alamat',
		'kontak',
		'email',
		/*
		'status',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
