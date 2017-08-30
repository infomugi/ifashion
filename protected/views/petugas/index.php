<?php
/* @var $this PetugasController */
/* @var $dataProvider CActiveDataProvider */
$this->pageTitle='Daftar Petugas';
$this->breadcrumbs=array(
	'Petugases',
);

$this->menu=array(
	array('label'=>'Tambah Petugas', 'url'=>array('create')),
	array('label'=>'Kelola Petugas', 'url'=>array('admin')),
);
?>

	<span class="hidden-xs">

		<?php echo CHtml::link('Tambah Petugas',
 array('create'),
 array('class' => 'btn btn-primary btn-flat'));
 ?>
		<?php echo CHtml::link('Kelola Petugas',
 array('admin'),
 array('class' => 'btn btn-primary btn-flat'));
 ?>

	</span>	

	<HR>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
