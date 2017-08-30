<?php
/* @var $this WarnaController */
/* @var $dataProvider CActiveDataProvider */
$this->pageTitle='Daftar Warna';
$this->breadcrumbs=array(
	'Warnas',
);

$this->menu=array(
	array('label'=>'Tambah Warna', 'url'=>array('create')),
	array('label'=>'Kelola Warna', 'url'=>array('admin')),
);
?>

	<span class="hidden-xs">

		<?php echo CHtml::link('Tambah Warna',
 array('create'),
 array('class' => 'btn btn-primary btn-flat'));
 ?>
		<?php echo CHtml::link('Kelola Warna',
 array('admin'),
 array('class' => 'btn btn-primary btn-flat'));
 ?>

	</span>	

	<HR>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
