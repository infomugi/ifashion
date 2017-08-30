<?php
/* @var $this UkuranController */
/* @var $model Ukuran */
$this->pageTitle='Detail Ukuran';

$this->menu=array(
	array('label'=>'Daftar Ukuran', 'url'=>array('index')),
	array('label'=>'Kelola Ukuran', 'url'=>array('admin')),
);
?>
	<?php echo CHtml::link('Tambah',
	 array('create'),
 array('class' => 'btn btn-primary btn-flat','title'=>'Add Ukuran'));
		 ?>
	<?php echo CHtml::link('Daftar',
	 array('index'),
 array('class' => 'btn btn-primary btn-flat', 'title'=>'List Ukuran'));
		 ?>
	<?php echo CHtml::link('Kelola',
	 array('admin'),
 array('class' => 'btn btn-primary btn-flat','title'=>'Manage Ukuran'));
		 ?>
	<?php echo CHtml::link('Edit', 
	 array('update', 'id'=>$model->id_ukuran,
		), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Ukuran'));
 ?>
	<?php echo CHtml::link('Hapus', 
	 array('delete', 'id'=>$model->id_ukuran,
		),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Ukuran'));
 ?>

	<HR>
	
	<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'htmlOptions'=>array("class"=>"table "),
	'attributes'=>array(
				'id_ukuran',
		'nama',
		'status',
		),
		)); ?>

	<STYLE>
		th{width:300px;}
	</STYLE>
