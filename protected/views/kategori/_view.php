<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_kategori')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_kategori),array('view','id'=>$data->id_kategori)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_kategori')); ?>:</b>
	<?php echo CHtml::encode($data->nama_kategori); ?>
	<br />


</div>