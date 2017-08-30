 <?php
 /* @var $this BarangController */
 /* @var $model Barang */
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



 			<div class="row-fluid">
 				<div class="span4">
 					<?php echo $form->labelEx($model,'kode_barang'); ?>
 				</div>   

 				<div class="span8">
 					<?php echo $form->textField($model,'kode_barang',array('size'=>10,'maxlength'=>10)); ?>
 				</div>
 			</div>  


 			<div class="row-fluid">
 				<div class="span4">
 					<?php echo $form->labelEx($model,'nama_barang'); ?>
 				</div>   

 				<div class="span8">
 					<?php echo $form->textField($model,'nama_barang',array('size'=>50,'maxlength'=>50)); ?>
 				</div>
 			</div>  


 			<div class="row-fluid">
 				<div class="span4">
 					<?php echo $form->labelEx($model,'kategori'); ?>
 				</div>   

 				<div class="span8">
 					<?php echo $form->dropDownList($model, "kategori",
 						CHtml::listData(Kategori::model()->findAll(),
 							'id_kategori', 'nama_kategori'
 							),
 						array("empty"=>"-- Kategori --", 'class'=>'form-control')
 						); ?> 
 					</div>
 				</div>  


 				<div class="row-fluid">
 					<div class="span4">
 						<?php echo $form->labelEx($model,'stok'); ?>
 					</div>   

 					<div class="span8">
 						<?php echo $form->textField($model,'stok'); ?>
 					</div>
 				</div>

 				<div class="row-fluid">
 					<div class="span4">
 						<?php echo $form->labelEx($model,'stok_minimum'); ?>
 					</div>   

 					<div class="span8">
 						<?php echo $form->textField($model,'stok_minimum'); ?>
 					</div>
 				</div> 			  


 				<div class="row-fluid">
 					<div class="span4">
 						<?php echo $form->labelEx($model,'gambar'); ?>
 					</div>   

 					<div class="span8">
 						<?php echo $form->fileField($model,'gambar',array('class'=>'btn btn-primary')); ?>
 					</div>
 				</div>  


 				<div class="row-fluid">
 					<div class="span4">
 						<?php echo $form->labelEx($model,'keterangan_produk'); ?>
 					</div>   

 					<div class="span8">
 						<?php echo $form->textArea($model,'keterangan_produk',array('row'=>6, 'cols'=>50)); ?>
 					</div>
 				</div>  


 				<div class="row-fluid">
 					<div class="span4">
 						<?php echo $form->labelEx($model,'harga_beli'); ?>
 					</div>   

 					<div class="span8">
 						<?php echo $form->textField($model,'harga_beli'); ?>
 					</div>
 				</div>  


 				<div class="row-fluid">
 					<div class="span4">
 						<?php echo $form->labelEx($model,'harga'); ?>
 					</div>   

 					<div class="span8">
 						<?php echo $form->textField($model,'harga'); ?>
 					</div>
 				</div>  


 				<div class="row-fluid">
 					<div class="span4">
 						<?php echo $form->labelEx($model,'warna'); ?>
 					</div>   

 					<div class="span8">
 						<?php echo $form->dropDownList($model, "warna",
 							CHtml::listData(Warna::model()->findAll(),
 								'id_warna', 'nama'
 								),
 							array("empty"=>"-- Warna --", 'class'=>'form-control')
 							); ?> 
 						</div>
 					</div>  


 					<div class="row-fluid">
 						<div class="span4">
 							<?php echo $form->labelEx($model,'ukuran'); ?>
 						</div>   

 						<div class="span8">
 							<?php echo $form->dropDownList($model, "ukuran",
 								CHtml::listData(ukuran::model()->findAll(),
 									'id_ukuran', 'nama'
 									),
 								array("empty"=>"-- Ukuran --", 'class'=>'form-control')
 								); ?> 
 							</div>
 						</div>  


 						<div class="row-fluid">
 							<div class="span4">
 								<?php echo $form->labelEx($model,'status'); ?>
 							</div>   

 							<div class="span8">
 								<?php echo $form->dropDownlist($model,'status',array('1'=>'Aktif','0'=>'Tidak Aktif')); ?>
 							</div>
 						</div>  

 						<div class="row-fluid">
 							<div class="span12">
 								<?php echo CHtml::submitButton($model->isNewRecord ? 'Simpan' : 'Edit', array('class' => 'btn btn-primary btn-lg pull-right')); ?>
 							</div>
 						</div>

 						<?php $this->endWidget(); ?>

 					</div>
 					<div class="span1"></div>
 				</div><!-- form --> 