<?php
/* @var $this PetugasController */
/* @var $model Petugas */
/* @var $form CActiveForm */
?>

<div class="row-fluid">

	<div class="span1">
	</div>

	<div class="span10" id="form">

		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'petugas-form',
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
					<?php echo $form->labelEx($model,'username'); ?>
				</div>   

				<div class="span8">
					<?php echo $form->textField($model,'username',array('size'=>50,'maxlength'=>50)); ?>
				</div>
			</div>  

			
			<div class="row-fluid">
				<div class="span4">
					<?php echo $form->labelEx($model,'password'); ?>
				</div>   

				<div class="span8">
					<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>100)); ?>
				</div>
			</div>  

			
			<div class="row-fluid">
				<div class="span4">
					<?php echo $form->labelEx($model,'email'); ?>
				</div>   

				<div class="span8">
					<?php echo $form->textField($model,'email',array('size'=>50,'maxlength'=>50)); ?>
				</div>
			</div>  

			<?php if(Yii::app()->user->record->level!=3): ?>
				<div class="row-fluid">
					<div class="span4">
						<?php echo $form->labelEx($model,'level'); ?>
					</div>   

					<div class="span8">
						<?php echo $form->textField($model,'level',array('size'=>10,'maxlength'=>10)); ?>
					</div>
				</div>  
			<?php endif; ?>

			<div class="row-fluid">
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Simpan' : 'Edit', array('class' => 'btn btn-primary pull-right')); ?>
			</div>

			<?php $this->endWidget(); ?>

		</div>

		<div class="span1">
		</div>

</div><!-- form -->