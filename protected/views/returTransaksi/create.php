<?php
/* @var $this ReturTransaksiController */
/* @var $model ReturTransaksi */
?>

<h2 class="header">Laporan <b>Barang</b><span class="header-line"></span></h2>
<div class="alert alert-danger">
	Kode Barang       : <?php echo $item ?><BR>
	Kode Transaksi    : <?php echo $ktrs ?><BR>
	Tanggal Transaksi : <?php echo $tgl ?><BR>
	
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>