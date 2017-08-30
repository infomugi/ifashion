<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'petugas-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'kode_petugas',array('class'=>'span5','readonly'=>'true','value'=>'P'.date('dmy'))); ?><br/>
      <?php echo $form->labelEx($model,'Password baru'); ?>
	  <?php echo $form->passwordField($model,'password',array('class'=>'span5','value'=>'')); ?><br/>
	   <?php echo $form->labelEx($model,'Ketik ulang Password Baru'); ?>
    <?php echo $form->passwordField($model,'password',array('class'=>'span5','value'=>'')); ?><br/>



	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Simpan' : 'Ubah',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
