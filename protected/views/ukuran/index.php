<?php
/* @var $this UkuranController */
/* @var $dataProvider CActiveDataProvider */
$this->pageTitle='Daftar Ukuran';
$this->breadcrumbs=array(
	'Ukurans',
);

$this->menu=array(
	array('label'=>'Tambah Ukuran', 'url'=>array('create')),
	array('label'=>'Kelola Ukuran', 'url'=>array('admin')),
);
?>

	<span class="hidden-xs">

		<?php echo CHtml::link('Tambah Ukuran',
 array('create'),
 array('class' => 'btn btn-primary btn-flat'));
 ?>
		<?php echo CHtml::link('Kelola Ukuran',
 array('admin'),
 array('class' => 'btn btn-primary btn-flat'));
 ?>

	</span>	

	<HR>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
