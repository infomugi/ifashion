<?php
/* @var $this SupplierController */
/* @var $model Supplier */
$this->pageTitle='Detail Supplier';

$this->menu=array(
	array('label'=>'Daftar Supplier', 'url'=>array('index')),
	array('label'=>'Kelola Supplier', 'url'=>array('admin')),
);
?>
	<?php echo CHtml::link('Tambah',
	 array('create'),
 array('class' => 'btn btn-primary btn-flat','title'=>'Add Supplier'));
		 ?>
	<?php echo CHtml::link('Daftar',
	 array('index'),
 array('class' => 'btn btn-primary btn-flat', 'title'=>'List Supplier'));
		 ?>
	<?php echo CHtml::link('Kelola',
	 array('admin'),
 array('class' => 'btn btn-primary btn-flat','title'=>'Manage Supplier'));
		 ?>
	<?php echo CHtml::link('Edit', 
	 array('update', 'id'=>$model->id_supplier,
		), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Supplier'));
 ?>
	<?php echo CHtml::link('Hapus', 
	 array('delete', 'id'=>$model->id_supplier,
		),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Supplier'));
 ?>

	<HR>
	
	<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'htmlOptions'=>array("class"=>"table "),
	'attributes'=>array(
				'id_supplier',
		'tanggal',
		'nama',
		'alamat',
		'kontak',
		'email',
		'status',
		),
		)); ?>

	<STYLE>
		th{width:300px;}
	</STYLE>
