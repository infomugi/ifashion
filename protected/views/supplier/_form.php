<?php
/* @var $this SupplierController */
/* @var $model Supplier */
/* @var $form CActiveForm */
?>

<div class="row-fluid">

	<div class="span1">
	</div>

	<div class="span10" id="form">

		<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'supplier-form',
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
					<?php echo $form->labelEx($model,'tanggal'); ?>
				</div>   

				<div class="span8">
					<?php echo $form->textField($model,'tanggal'); ?>
				</div>
			</div>  

			
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
					<?php echo $form->labelEx($model,'alamat'); ?>
				</div>   

				<div class="span8">
					<?php echo $form->textField($model,'alamat',array('size'=>60,'maxlength'=>150)); ?>
				</div>
			</div>  

			
			<div class="row-fluid">
				<div class="span4">
					<?php echo $form->labelEx($model,'kontak'); ?>
				</div>   

				<div class="span8">
					<?php echo $form->textField($model,'kontak',array('size'=>25,'maxlength'=>25)); ?>
				</div>
			</div>  

			
			<div class="row-fluid">
				<div class="span4">
					<?php echo $form->labelEx($model,'email'); ?>
				</div>   

				<div class="span8">
					<?php echo $form->textField($model,'email',array('size'=>25,'maxlength'=>25)); ?>
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