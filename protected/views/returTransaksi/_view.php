<?php
/* @var $this ReturTransaksiController */
/* @var $data ReturTransaksi */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_retur_transaksi')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_retur_transaksi), array('view', 'id'=>$data->id_retur_transaksi)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tanggal')); ?>:</b>
	<?php echo CHtml::encode($data->tanggal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kode_barang')); ?>:</b>
	<?php echo CHtml::encode($data->kode_barang); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('transaksi_id')); ?>:</b>
	<?php echo CHtml::encode($data->transaksi_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('detail_transaksi_id')); ?>:</b>
	<?php echo CHtml::encode($data->detail_transaksi_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jumlah')); ?>:</b>
	<?php echo CHtml::encode($data->jumlah); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('petugas_id')); ?>:</b>
	<?php echo CHtml::encode($data->petugas_id); ?>
	<br />

	*/ ?>

</div>