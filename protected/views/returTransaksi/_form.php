<?php
/* @var $this ReturTransaksiController */
/* @var $model ReturTransaksi */
/* @var $form CActiveForm */
?>

<div class="form-normal form-horizontal clearfix">
	<div class="span12"> 

		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'transaksi-form',
			'enableAjaxValidation'=>false,
			// 'enableClientValidation' => true,
			'clientOptions' => array(
				'validateOnSubmit' => true,
				),
			'errorMessageCssClass' => 'label label-danger',
			'htmlOptions' => array('class' => 'form-horizontal', 'role' => 'form','autocomplete'=>'off')
			)); ?>

			<?php echo $form->errorSummary($model, null, null, array('class' => 'alert alert-warning')); ?>

				<div class="form-group">
					<div class="span4">
						<?php echo $form->labelEx($model,'type'); ?>
					</div>   

					<div class="span8">
						<?php echo $form->error($model,'type'); ?>
						<?php echo $form->dropDownlist($model,'type',array(''=>'- Pilih Laporan -','Barang Hilang'=>'Barang Hilang','Barang Cacat'=>'Barang Cacat','Barang Rusak'=>'Barang Rusak')); ?>
					</div>
				</div>  


				<div class="form-group">
					<div class="span4">
						<?php echo $form->labelEx($model,'jumlah'); ?>
					</div>   

					<div class="span8">
						<?php echo $form->error($model,'jumlah'); ?>
						<?php echo $form->textField($model,'jumlah'); ?>
					</div>
				</div>  


			<div class="form-group">
				<div class="span4">
					<?php echo $form->labelEx($model,'tanggal'); ?>
				</div>   

				<div class="span8">
					<?php echo $form->error($model,'tanggal'); ?>
					<?php
					$this->widget('zii.widgets.jui.CJuiDatePicker',array(
						'model' => $model,
						'attribute' => 'tanggal',
						'flat'=>true,
						'id'=>'tanggal',
						'value'=>Yii::app()->dateFormatter->format("d-mm-yy",strtotime($model->tanggal)),
						'options'=>array(
							'dateFormat' => 'd-mm-yy',
							'showAnim'=>'fadeIn',
							'changeMonth'=>true,
							'changeYear'=>true,
							'changeTime'=>true,
							'yearRange' => '2000:2099',
							'onSelect' => 'js:function( selectedDate ) {
								$("#tanggalBerakhir").datepicker( "option", "minDate", selectedDate );
							}',
							),

						'htmlOptions'=>array(
							'class'=>'form-control span12',
							),

						));
						?>
					</div>
				</div>  



				<div class="form-group">
					<div class="span12 form-actions">  
						<?php $this->widget('bootstrap.widgets.TbButton', array(
							'buttonType'=>'submit',
							'type'=>'primary',
							'label'=>$model->isNewRecord ? 'Simpan' : 'Ubah',
							)); ?>
						</div>
					</div>

					<?php $this->endWidget(); ?>

</div></div><!-- form -->