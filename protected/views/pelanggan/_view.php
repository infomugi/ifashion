<?php
/* @var $this PelangganController */
/* @var $data Pelanggan */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_pelanggan')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_pelanggan), array('view', 'id'=>$data->id_pelanggan)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tanggal')); ?>:</b>
	<?php echo CHtml::encode($data->tanggal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama')); ?>:</b>
	<?php echo CHtml::encode($data->nama); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alamat')); ?>:</b>
	<?php echo CHtml::encode($data->alamat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kontak')); ?>:</b>
	<?php echo CHtml::encode($data->kontak); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />


</div>