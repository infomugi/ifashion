<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Report';
$this->breadcrumbs=array(
	'Report',
	);
	?>
	<div class="row-fluid">
		<div class="span1">
		</div>
		<div class="span10">
			<h3>Laporan Periodik - Transaksi</h3>
			<HR>
				<form target="_BLANK" action="<?php echo $this->createUrl('transaksi/laporan');?>" method="post">

					<div class="form-group">
						<div class="span4 control-label">
							Tanggal Mulai
						</div>   
						<div class="span8">
							<?php
							$this->widget('zii.widgets.jui.CJuiDatePicker', array(
								'name'=>'startDate',
								'options' => array(
									'showAnim' => 'fold',
									'dateFormat' => 'yy-mm-dd',
									'changeMonth' => true,
									'changeYear' => true,
									'yearRange' => '2000:2099',
									'onSelect' => 'js:function( selectedDate ) {
										$("#endDate").datepicker( "option", "minDate", selectedDate );
									}',
									),
								'htmlOptions'=>array(
									'class'=>'form-control',
									'placeholder'=>'Tanggal Mulai'
									),                    
								));
								?>
							</div>
						</div>  

						<div class="form-group">
							<div class="span4 control-label">
								Tanggal Berakhir
							</div>   
							<div class="span8">
								<?php
								$this->widget('zii.widgets.jui.CJuiDatePicker', array(
									'name'=>'endDate',
									'options' => array(
										'showAnim' => 'fold',
										'dateFormat' => 'yy-mm-dd',
										'changeMonth' => true,
										'changeYear' => true,
										),
									'htmlOptions'=>array(
										'class'=>'form-control',
										'placeholder'=>'Tanggal Akhir'
										),                       
									));
									?>
								</div>
							</div>  

							<div class="form-group">
								<div class="span4 control-label">
									Jenis Barang
								</div>   
								<div class="span8">
									<select name="jenis" class="form-control">
										<option value="">- Jenis -</option>
										<option value="Barang Masuk">Barang Masuk</option>
										<option value="Barang Keluar">Barang Keluar</option>
										<option value="Barang Retur">Barang Retur</option>
									</select>
								</div>
							</div>  

							<div class="form-group">
								<div class="span4 control-label">
									Status Data
								</div>   
								<div class="span8">
									<select name="status" class="form-control">
										<option value="">- Status -</option>
										<option value="Belum di Verifikasi">Belum di Verifikasi</option>
										<option value="Verifikasi">Verifikasi</option>
									</select>
								</div>
							</div>  	

							<div class="form-group">
								<div class="span4 control-label">
									Jenis Report
								</div>   
								<div class="span8">
									<select name="jenisreport" class="form-control">
										<option value="">- Jenis Report -</option>
										<option value="List">List Daftar</option>
										<option value="Tabel">Tabel</option>
									</select>
								</div>
							</div>  	

							<div class="form-group">
								<div class="span4">
								</div>
								<div class="span8">
									<input class="btn btn-inverse btn-large btn-flat pull-right" type="submit" value="Tampilkan" >
								</div>   
							</div>

						</form>

					</div>
					<div class="span1">
					</div>
				</div>

				<style type="text/css">
					
					.navbar-inverse .navbar-inner, div.portlet-decoration{
						background-color: #000;
					}

					a {
						color: #000; 
					}

				</style>