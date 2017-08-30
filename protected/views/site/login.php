<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
  );
  ?>


  <div id="login">
    <div class="logo">
      <a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/indexes/images/logo.jpg" alt="" /></a>
    </div>
    <BR>
      <BR>
        <div class="wrapper-login">

          <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'login-form',
            'enableClientValidation'=>true,
            'clientOptions'=>array(
             'validateOnSubmit'=>true,
             ),
             )); ?>

             <BR>
               <?php echo $form->textField($model,'username', array('class' => 'form-control text-blue', 'placeholder'=>'Username')); ?>
               <?php echo $form->error($model,'username', array('class'=>'alert alert-warning')); ?>
               <BR>
                 <?php echo $form->passwordField($model,'password', array('class' => 'form-control text-blue','placeholder'=>'Password')); ?>
                 <?php echo $form->error($model,'password', array('class'=>'alert alert-warning')); ?>

               </div>


               <?php echo CHtml::submitButton('Login', array('class' => 'btn btn-lg btn-warning btn-block')); ?>
               <?php $this->endWidget(); ?>

             </div>  


