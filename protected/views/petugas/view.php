<?php
/* @var $this PetugasController */
/* @var $model Petugas */
$this->pageTitle='Detail Petugas';

$this->menu=array(
	array('label'=>'Daftar Petugas', 'url'=>array('index')),
	array('label'=>'Kelola Petugas', 'url'=>array('admin')),
);
?>
	<?php echo CHtml::link('Tambah',
	 array('create'),
 array('class' => 'btn btn-primary btn-flat','title'=>'Add Petugas'));
		 ?>
	<?php echo CHtml::link('Daftar',
	 array('index'),
 array('class' => 'btn btn-primary btn-flat', 'title'=>'List Petugas'));
		 ?>
	<?php echo CHtml::link('Kelola',
	 array('admin'),
 array('class' => 'btn btn-primary btn-flat','title'=>'Manage Petugas'));
		 ?>
	<?php echo CHtml::link('Edit', 
	 array('update', 'id'=>$model->kode_petugas,
		), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Petugas'));
 ?>
	<?php echo CHtml::link('Hapus', 
	 array('delete', 'id'=>$model->kode_petugas,
		),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Petugas'));
 ?>

	<HR>
	
	<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'htmlOptions'=>array("class"=>"table "),
	'attributes'=>array(
				'kode_petugas',
		'username',
		'password',
		'email',
		'level',
		),
		)); ?>

	<STYLE>
		th{width:300px;}
	</STYLE>
