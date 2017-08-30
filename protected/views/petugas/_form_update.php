<?php
/* @var $this PetugasController */
/* @var $model Petugas */
/* @var $form CActiveForm */
?>


<div class="form-normal form-horizontal clearfix">
	<div class="span9 span10"> 

		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'petugas-form',
			'enableAjaxValidation'=>false,
			'enableClientValidation' => true,
			'clientOptions' => array(
				'validateOnSubmit' => true,
				),
			'errorMessageCssClass' => 'label label-danger',
			'htmlOptions' => array('class' => 'form-horizontal', 'role' => 'form')
			)); ?>

			<?php echo $form->errorSummary($model, null, null, array('class' => 'alert alert-warning')); ?>

			
				<div class="form-group">
	
						<div class="span4 control-label">
							<?php echo $form->labelEx($model,'kode_petugas'); ?>
						</div>   

						<div class="span8">
							<?php echo $form->error($model,'kode_petugas'); ?>
							<?php echo $form->textField($model,'kode_petugas',array('class'=>'form-control','value'=>date('sm'),'readonly'=>'true')); ?>
						</div>
		
				</div>  

				
				<div class="form-group">
	
						<div class="span4 control-label">
							<?php echo $form->labelEx($model,'username'); ?>
						</div>   

						<div class="span8">
							<?php echo $form->error($model,'username'); ?>
							<?php echo $form->textField($model,'username',array('class'=>'form-control')); ?>
						</div>
		
				</div>  

				
				<div class="form-group">
	
						<div class="span4 control-label">
							<?php echo $form->labelEx($model,'password'); ?>
						</div>   

						<div class="span8">
							<?php echo $form->error($model,'password'); ?>
							<?php echo $form->passwordField($model,'password',array('class'=>'form-control')); ?>
						</div>
		
				</div>  

				
				<div class="form-group">
	
						<div class="span4 control-label">
							<?php echo $form->labelEx($model,'email'); ?>
						</div>   

						<div class="span8">
							<?php echo $form->error($model,'email'); ?>
							<?php echo $form->textField($model,'email',array('class'=>'form-control')); ?>
						</div>
		
				</div>  

				

							<div class="form-group">
				<div class="col-md-12">  
				</br></br>
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Submit' : 'Edit', array('class' => 'btn btn-info btn-flat pull-right')); ?>
			</div>
		</div>

		<?php $this->endWidget(); ?>

</div></div><!-- form -->