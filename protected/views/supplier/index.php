<?php
/* @var $this SupplierController */
/* @var $dataProvider CActiveDataProvider */
$this->pageTitle='Daftar Supplier';
$this->breadcrumbs=array(
	'Suppliers',
);

$this->menu=array(
	array('label'=>'Tambah Supplier', 'url'=>array('create')),
	array('label'=>'Kelola Supplier', 'url'=>array('admin')),
);
?>

	<span class="hidden-xs">

		<?php echo CHtml::link('Tambah Supplier',
 array('create'),
 array('class' => 'btn btn-primary btn-flat'));
 ?>
		<?php echo CHtml::link('Kelola Supplier',
 array('admin'),
 array('class' => 'btn btn-primary btn-flat'));
 ?>

	</span>	

	<HR>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
