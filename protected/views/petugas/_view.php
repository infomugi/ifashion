<?php
/* @var $this PetugasController */
/* @var $data Petugas */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('kode_petugas')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->kode_petugas), array('view', 'id'=>$data->kode_petugas)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('level')); ?>:</b>
	<?php echo CHtml::encode($data->level); ?>
	<br />


</div>