<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Stock Opname';
$this->breadcrumbs=array(
	'Stock Opname',
	);
	?>
	<h3>Stock Opname</h3>
	<HR>
		<div class="alert alert-warning">Cari Barang Berdasarkan : Kode Barang, Nama Barang, Jumlah Stock</div>
		<?php 
		echo CHtml::beginForm(CHtml::normalizeUrl(array('barang/stockofname')), 'get')
		. CHtml::textField('string', (isset($_GET['string'])) ? $_GET['string'] : '', array('id'=>'string','class'=>'form-control span12 input-xxlarge','placeholder'=>'Stock of Name'))
		. CHtml::endForm();
		?>

