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

				<div class="span12">
					<p class="alert alert-primary text-right"><i class="text-right" id="NIK"><a href="#" onclick="$(&quot;#mydialog&quot;).dialog(&quot;open&quot;);" return="" false;=""><code>Cari Pelanggan</code></a></i></p>
				</div>
				
			</div>


			<div class="row-fluid" style="display:none;">
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


				<div class="form-group">
					<div class="span4 control-label">
						<?php echo $form->labelEx($model,'nama'); ?>
					</div>   
					<div class="span8">
						<input type="text" class="form-control span12" id="nama" disabled>
					</div>
				</div> 

				<div class="form-group">
					<div class="span4 control-label">
						<?php echo $form->labelEx($model,'alamat'); ?>
					</div>   
					<div class="span8">
						<input type="text" class="form-control span12" id="alamat" disabled>
					</div>
				</div>  

				<div class="form-group">
					<div class="span4 control-label">
						<?php echo $form->labelEx($model,'kontak'); ?>
					</div>   
					<div class="span8">
						<input type="text" class="form-control span12" id="kontak" disabled>
					</div>
				</div>  


				<div class="form-group">
					<div class="span4 control-label">
						<?php echo $form->labelEx($model,'email'); ?>
					</div>   
					<div class="span8">
						<input type="text" class="form-control span12" id="email" disabled>
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
							'value' => (($model->isNewRecord) ? $model->generateTransactionCodeOut() : $model->kode_transaksi),
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
								<?php echo CHtml::submitButton($model->isNewRecord ? 'Simpan' : 'Edit', array('class' => 'btn btn-success btn-lg pull-right')); ?>
							</div>
						</div>

						<?php $this->endWidget(); ?>

					</div>
					<div class="span1"></div>
				</div>

				<style type="text/css">
					form div {
						display: block;
						margin-bottom: 10px;
					}
					.navbar-inverse .navbar-inner, div.portlet-decoration{
						background-color: #41bb19;
					}

					a {
						color: #41bb19; 
					}

				</style>


				<fieldset>
					<?php 
					$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
			//Nama selector/id
						'id'=>'mydialog',

			// additional javascript options for the dialog plugin
						'options'=>array(
							'title'=>'Klik Tanda + untuk memilih data Barang',
							'autoOpen'=>true,

				//Fokus atau modal diaktifkan
							'modal' => true,
							'show'=>array(
								'effect'=>'blind',
								'duration'=>300,
								),
							'hide'=>array(
								'effect'=>'blind',
								'duration'=>300,
								),
							'width' => 840, 
							'height' => 480
							),
							));?>

					<?php $this->widget('zii.widgets.grid.CGridView', array(
						'id'=>'detail-transaksi-grid',
						'dataProvider'=>$pelanggan->search(),
						'filter'=>$pelanggan,
						'itemsCssClass' => 'table table-striped table-hover',
						'columns'=>array(		

							array(
								'header'=>'No',
								'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
								'htmlOptions'=>array('width'=>'10px', 
									'style' => 'text-align: center;')),

							array(
								'name'=>'id_pelanggan',
								'filter'=> CHtml::activeTextField($pelanggan, 'id_pelanggan'),
								'htmlOptions'=>array('width'=>'150px', 
									'style' => 'text-align: left;'),

								),

							array(
								'name'=>'nama',
								'filter'=> CHtml::activeTextField($pelanggan, 'nama'),
								'htmlOptions'=>array('width'=>'150px', 
									'style' => 'text-align: left;'),

								),


							array(
								'name'=>'alamat',
								'filter'=> CHtml::activeTextField($pelanggan, 'alamat'),
								'htmlOptions'=>array('width'=>'150px', 
									'style' => 'text-align: left;'),

								),


							array(
								'name'=>'kontak',
								'filter'=> CHtml::activeTextField($pelanggan, 'kontak'),
								'htmlOptions'=>array('width'=>'150px', 
									'style' => 'text-align: left;'),

								),


							array(
								'name'=>'email',
								'filter'=> CHtml::activeTextField($pelanggan, 'email'),
								'htmlOptions'=>array('width'=>'150px', 
									'style' => 'text-align: left;'),

								),



							array(
								'header'=>'PILIH',
								'type'=>'raw',
								'htmlOptions'=>array('width'=>'70px', 
									'style' => 'text-align: left;'),          
								'value'=>'CHtml::Button(
								"+"
								, array(
								"class" => "btn btn-success"
								, "id" => "get_link"
								, "onClick" => "$(\"#mydialog\").dialog(\"close\");$(\"#Transaksi_pelanggan_id \").val(\"". $data->id_pelanggan."\");
								$(\"#Transaksi_pelanggan_id \").val(\"". $data->id_pelanggan."\");
								$(\"#nama \").val(\"". $data->nama."\");
								$(\"#alamat \").val(\"". $data->alamat."\");
								$(\"#kontak \").val(\"". $data->kontak."\");
								$(\"#email \").val(\"". $data->email."\");
								"))',
								),
							),
							)); ?>


							<?php $this->endWidget('zii.widgets.jui.CJuiDialog'); ?>

						</fieldset>