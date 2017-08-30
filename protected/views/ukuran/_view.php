<?php
/* @var $this UkuranController */
/* @var $data Ukuran */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_ukuran')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_ukuran), array('view', 'id'=>$data->id_ukuran)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama')); ?>:</b>
	<?php echo CHtml::encode($data->nama); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />


</div>