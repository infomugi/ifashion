<?php
/* @var $this TransaksiController */
/* @var $model Transaksi */

$this->breadcrumbs=array(
	'Transaksis'=>array('index'),
	$model->id_transaksi,
	);

$detailtransaksi=new CActiveDataProvider('DetailTransaksi', array(
	'criteria'=>array(
		'condition'=>'transaksi_id = '.$model->id_transaksi,
		'order'=>'tanggal DESC'
		)
	));

$this->pageTitle='Print - Penjualan #'.$model->kode_transaksi;
?>

<?php
/* @var $this TransaksiController */
/* @var $model Transaksi */

function terbilang($satuan){
	$huruf = array ("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh","sebelas");
	if ($satuan < 12)
		return " ".$huruf[$satuan];
	elseif ($satuan < 20)
		return terbilang($satuan - 10)." belas";
	elseif ($satuan < 100)
		return terbilang($satuan / 10)." puluh".terbilang($satuan % 10);
	elseif ($satuan < 200)
		return "seratus".terbilang($satuan - 100);
	elseif ($satuan < 1000)
		return terbilang($satuan / 100)." ratus".terbilang($satuan % 100);
	elseif ($satuan < 2000)
		return "seribu".terbilang($satuan - 1000); 
	elseif ($satuan < 1000000)
		return terbilang($satuan / 1000)." ribu".terbilang($satuan % 1000); 
	elseif ($satuan < 1000000000)
		return terbilang($satuan / 1000000)." juta".terbilang($satuan % 1000000); 
	elseif ($satuan >= 1000000000)
		echo "Angka yang Anda masukkan terlalu besar";
}

$detailtransaksi=new CActiveDataProvider('DetailTransaksi', array(
	'criteria'=>array(
		'condition'=>'transaksi_id = '.$model->id_transaksi,
		'order'=>'tanggal DESC'
		)
	));

$this->pageTitle='Print Transaksi - '.$model->kode_transaksi;


?>								



<h3>Faktur #<?php echo $model->kode_transaksi; ?></h3>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'htmlOptions'=>array("class"=>"table"),
	'attributes'=>array(
		'id_transaksi',
		array('label'=>'Nama Pelanggan','value'=>$model->Pelanggan->nama),
		'tanggal',
		),
		)); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'detail-transaksi-grid',
	'summaryText'=>'',
	'dataProvider'=>$detailtransaksi,
	'itemsCssClass' => 'table-responsive table table-striped table-hover table-vcenter',
	'columns'=>array(

		array(
			'header'=>'No',
			'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
			'htmlOptions'=>array('width'=>'10px', 
				'style' => 'text-align: center;')),

		array(
			'header'=>'Nama Barang',
			'value'=>'$data->Barang->kode_barang',
			),

		array(
			'header'=>'Nama Barang',
			'value'=>'$data->Barang->nama_barang',
			),

		array(
			'header'=>'Harga',
			'value'=>'Transaksi::model()->rupiah($data->Barang->harga)',
			),


		array(
			'header'=>'QTY',
			'value'=>'$data->jumlah',
			),

		array(
			'header'=>'Subtotal',
			'value'=>'Transaksi::model()->rupiah($data->Barang->harga * $data->jumlah)',
			),

		),
		)); ?>


		<?php if(Transaksi::model()->grandTotal($model->id_transaksi)!=0): ?>


			<?php if($model->pelanggan_id==1){ ?>

				<h3 class="text-success text-right">Total <?php echo Transaksi::model()->rupiah(Transaksi::model()->grandTotal($model->id_transaksi)); ?>,- </h3>
				<small><span class="text-primary text-right">Terbilang <i><b><?php echo ucwords(terbilang(Transaksi::model()->grandTotal($model->id_transaksi))); ?></b></i></span></small>


				<?php }else{ ?>

					<div class="alert alert-success">Member Discount Rp. 1000,- Per Item. ( Grand Total Sebelum Discount <?php echo Transaksi::model()->rupiah(Transaksi::model()->grandTotal($model->id_transaksi)); ?> )</div>
					<h3 class="text-success text-right">Total <?php echo Transaksi::model()->rupiah(Transaksi::model()->grandTotalDiscount($model->id_transaksi)); ?>,-</h3>
					<small><span class="text-primary text-right">Terbilang <i><b><?php echo ucwords(terbilang(Transaksi::model()->grandTotalDiscount($model->id_transaksi))); ?></b></i></span></small>


					<?php } ?>

				<?php endif; ?>




				<STYLE>
					th{width:150px;}
				</STYLE>

