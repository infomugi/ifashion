<?php
/* @var $this DetailTransaksiController */
/* @var $model DetailTransaksi */
/* @var $form CActiveForm */
?>

<div class="row-fluid">
	<div class="span1"></div>
	<div class="span10" id="form">

		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'barang-form',
			'enableAjaxValidation'=>false,
			'enableClientValidation' => true,
			'clientOptions' => array(
				'validateOnSubmit' => true,
				),
			'errorMessageCssClass' => 'label label-danger',
			'htmlOptions' => array('enctype' => 'multipart/form-data','autocomplete'=>'off'),
			)); ?>

			<?php echo $form->errorSummary($model, null, null, array('class' => 'alert alert-warning')); ?>


			<div class="form-group">
				<div class="span4 control-label">
					<?php echo $form->labelEx($model,'kode_barang'); ?>
				</div>   
				<div class="span8">
					<?php echo $form->textField($model,'kode_barang',array('class'=>'form-control span12','readOnly'=>true)); ?>
				</div>
			</div>  

			<div class="form-group">
				<div class="span4 control-label">
					<?php echo $form->labelEx($model,'nama_barang'); ?>
				</div>   
				<div class="span8">
					<input type="text" class="form-control span12" id="DetailTransaksi_nama_barang" disabled>
				</div>
			</div>  	

			<div class="form-group">
				<div class="span4 control-label">
					<?php echo $form->labelEx($model,'stok'); ?>
				</div>   
				<div class="span8">
					<input type="text" class="form-control span12" id="DetailTransaksi_stok" disabled>
				</div>
			</div>  										

			<div class="form-group">
				<div class="span4 control-label">
					<?php echo $form->labelEx($model,'jumlah'); ?>
				</div>   
				<div class="span8">
					<?php echo $form->textField($model,'jumlah',array('class'=>'form-control span12')); ?>
				</div>
			</div>  								

			<div class="row-fluid">

				<div class="span9">
					<p class="alert alert-primary text-right"><i class="text-right" id="NIK"><a href="#" onclick="$(&quot;#mydialog&quot;).dialog(&quot;open&quot;);" return="" false;=""><code>Cari Barang</code></a></i></p>
				</div>
				<div class="span3">
					<?php echo CHtml::submitButton($model->isNewRecord ? 'Tambahkan' : 'Edit', array('class' => 'btn btn-primary btn-lg pull-right')); ?>
				</div>
			</div>

			<?php $this->endWidget(); ?>

		</div>
		<div class="span1"></div>
	</div><!-- form -->



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
			'dataProvider'=>$model2->search(),
			'filter'=>$model2,
			'itemsCssClass' => 'table table-striped table-hover',
			'columns'=>array(		

				array(
					'header'=>'No',
					'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
					'htmlOptions'=>array('width'=>'10px', 
						'style' => 'text-align: center;')),

				array(
					'name'=>'id_barang',
					'filter'=> CHtml::activeTextField($model2, 'id_barang'),
					'htmlOptions'=>array('width'=>'150px', 
						'style' => 'text-align: left;'),

					),

				array(
					'name'=>'kode_barang',
					'filter'=> CHtml::activeTextField($model2, 'kode_barang'),
					'htmlOptions'=>array('width'=>'150px', 
						'style' => 'text-align: left;'),

					),

				array(
					'name'=>'nama_barang',
					'filter'=> CHtml::activeTextField($model2, 'nama_barang'),
					'htmlOptions'=>array('width'=>'200px', 
						'style' => 'text-align: left;'),         
					),

				array(
					'name'=>'stok',
					'filter'=> CHtml::activeTextField($model2, 'stok'),
					'htmlOptions'=>array('width'=>'100px', 
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
					, "onClick" => "$(\"#mydialog\").dialog(\"close\");$(\"#kode_barang \").val(\"". $data->kode_barang."\");
					$(\"#DetailTransaksi_kode_barang \").val(\"". $data->id_barang."\");
					$(\"#DetailTransaksi_kode_barangs \").val(\"". $data->kode_barang."\");
					$(\"#DetailTransaksi_nama_barang \").val(\"". $data->nama_barang."\");
					$(\"#DetailTransaksi_stok \").val(\"". $data->stok."\");
					"))',
					),
				),
				)); ?>


				<?php $this->endWidget('zii.widgets.jui.CJuiDialog'); ?>

			</fieldset>