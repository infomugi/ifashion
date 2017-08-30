<?php
/* @var $this WarnaController */
/* @var $model Warna */
/* @var $form CActiveForm */
?>

<div class="row-fluid">

	<div class="span1">
	</div>

	<div class="span10" id="form">

		<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'warna-form',
		'enableAjaxValidation'=>false,
		'enableClientValidation' => true,
		'clientOptions' => array(
		'validateOnSubmit' => true,
		),
		'errorMessageCssClass' => 'label label-danger',
		'htmlOptions' => array('enctype' => 'multipart/form-data','autocomplete'=>'off'),		
		)); ?>

		<?php echo $form->errorSummary($model, null, null, array('class' => 'alert alert-warning')); ?>

		
			<div class="row-fluid">
				<div class="span4">
					<?php echo $form->labelEx($model,'nama'); ?>
				</div>   

				<div class="span8">
					<?php echo $form->textField($model,'nama',array('size'=>50,'maxlength'=>50)); ?>
				</div>
			</div>  

			
			<div class="row-fluid">
				<div class="span4">
					<?php echo $form->labelEx($model,'status'); ?>
				</div>   

				<div class="span8">
					<?php echo $form->textField($model,'status'); ?>
				</div>
			</div>  

					<div class="row-fluid">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Simpan' : 'Edit', array('class' => 'btn btn-primary pull-right')); ?>
		</div>

		<?php $this->endWidget(); ?>

	</div>

	<div class="span1">
	</div>

</div><!-- form -->