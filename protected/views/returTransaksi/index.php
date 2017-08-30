<?php
/* @var $this ReturTransaksiController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Retur Transaksis',
);

$this->menu=array(
	array('label'=>'Create ReturTransaksi', 'url'=>array('create')),
	array('label'=>'Manage ReturTransaksi', 'url'=>array('admin')),
);
?>

<h2 class="header">Daftar <b>Retur Transaksis</b><span class="header-line"></span></h2>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
