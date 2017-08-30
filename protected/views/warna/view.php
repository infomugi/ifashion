<?php
/* @var $this WarnaController */
/* @var $model Warna */
$this->pageTitle='Detail Warna';

$this->menu=array(
	array('label'=>'Daftar Warna', 'url'=>array('index')),
	array('label'=>'Kelola Warna', 'url'=>array('admin')),
);
?>
	<?php echo CHtml::link('Tambah',
	 array('create'),
 array('class' => 'btn btn-primary btn-flat','title'=>'Add Warna'));
		 ?>
	<?php echo CHtml::link('Daftar',
	 array('index'),
 array('class' => 'btn btn-primary btn-flat', 'title'=>'List Warna'));
		 ?>
	<?php echo CHtml::link('Kelola',
	 array('admin'),
 array('class' => 'btn btn-primary btn-flat','title'=>'Manage Warna'));
		 ?>
	<?php echo CHtml::link('Edit', 
	 array('update', 'id'=>$model->id_warna,
		), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Warna'));
 ?>
	<?php echo CHtml::link('Hapus', 
	 array('delete', 'id'=>$model->id_warna,
		),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Warna'));
 ?>

	<HR>
	
	<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'htmlOptions'=>array("class"=>"table "),
	'attributes'=>array(
				'id_warna',
		'nama',
		'status',
		),
		)); ?>

	<STYLE>
		th{width:300px;}
	</STYLE>
