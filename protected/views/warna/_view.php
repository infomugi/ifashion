<?php
/* @var $this WarnaController */
/* @var $data Warna */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_warna')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_warna), array('view', 'id'=>$data->id_warna)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama')); ?>:</b>
	<?php echo CHtml::encode($data->nama); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />


</div>