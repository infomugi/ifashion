<?php
/* @var $this TransaksiController */
/* @var $model Transaksi */
/* @var $form CActiveForm */
?>

<div class="row-fluid">
	<div class="span1"></div>
	<div class="span10" id="form">

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

			<div class="row-fluid">
				<div class="span4">
					<?php echo $form->labelEx($model,'pelanggan_id'); ?>
				</div>   

				<div class="span8">
					<?php echo $form->dropDownList($model, "pelanggan_id",
						CHtml::listData(Pelanggan::model()->findAll(),
							'id_pelanggan', 'nama'
							),
						array("empty"=>"-- Pelanggan --", 'class'=>'form-control')
						); ?> 
					</div>
				</div>  


				<div class="row-fluid">
					<div class="span4">
						<?php echo $form->labelEx($model,'supplier_id'); ?>
					</div>   

					<div class="span8">
						<?php echo $form->dropDownList($model, "supplier_id",
							CHtml::listData(Supplier::model()->findAll(),
								'id_supplier', 'nama'
								),
							array("empty"=>"-- Supplier --", 'class'=>'form-control')
							); ?> 
						</div>
					</div>  

					<div class="row-fluid">
						<div class="span4">
							<?php echo $form->labelEx($model,'kode_transaksi'); ?>
						</div>   
						<div class="span8">
							<?php echo $form->error($model,'kode_transaksi'); ?>
							<?php echo $form->textField($model,'kode_transaksi',array('size'=>15,
								'maxlength'=>15,
								'class'=>'form-control',
								'value' => (($model->isNewRecord) ? $model->generateReturCode() : $model->kode_transaksi),
								'readonly'=>true)); ?>
							</div>
						</div>  

						<div class="row-fluid">
							<div class="span4">
								<?php echo $form->labelEx($model,'nama_petugas'); ?>
							</div>   
							<div class="span8">
								<input type="text" class="form-control" value="<?PHP echo YII::app()->user->name; ?>" disabled>
							</div>
						</div>  					

						<div class="row-fluid">

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
										'class'=>'form-control',
										),

									));
									?>
								</div>

							</div>  




							<div class="row-fluid">
								<div class="span12">
									<?php echo CHtml::submitButton($model->isNewRecord ? 'Simpan' : 'Edit', array('class' => 'btn btn-danger btn-lg pull-right')); ?>
								</div>
							</div>

							<?php $this->endWidget(); ?>

						</div>
					</div>

					<style type="text/css">
						form div {
							display: block;
							margin-bottom: 10px;
						}

						.navbar-inverse .navbar-inner, div.portlet-decoration{
							background-color: #ff0039;
						}

						a {
							color: #ff0039; 
						}
					</style>