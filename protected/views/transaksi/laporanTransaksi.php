<?php
/* @var $this TransaksiController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Transaksi Barang',
	);

$from=$_REQUEST['startDate'];
$until=$_REQUEST['endDate'];
$statusTransaksi=$_REQUEST['status'];
$jenisTransaksi=$_REQUEST['jenis'];

$tampa = "'"."$from"."'";
$tampb = "'"."$until"."'";
$status = "'"."$statusTransaksi"."'";
$jenis = "'"."$jenisTransaksi"."'";

$this->pageTitle='Laporan Transaksi - ' . $jenisTransaksi . ' - Tanggal '.$from.' sampai '.$until;
?>

<section class="col-xs-12">

	<DIV style="background:#000;color:#FFF;padding:10px 0;text-align:center;">
	Laporan Tanggal : <b><?php echo($from);?></b> s/d <b><?php echo($until);?></b> - Jenis : <b><?php echo $jenisTransaksi ?></b> - Status : <b><?php echo $statusTransaksi; ?></b> 
	</DIV>
		<?php
		$dataProvider = new CActiveDataProvider('Transaksi', array(
			'criteria' => array(
				'condition'=>'tanggal >= ' . $tampa . ' AND tanggal <= ' . $tampb . ' AND status='. $status . ' AND jenis_transaksi='.$jenis,
				'order'=>'tanggal ASC'
				),
			'pagination'=>array(
				'pageSize'=>1000
				)
			));

		if($jenisReport=="List"){
		$this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$dataProvider,
			'itemView'=>'_print_list',
			'summaryText'=>'',
			)); 
		}else{
		$this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$dataProvider,
			'itemView'=>'_print_tabel',
			'summaryText'=>'',
			)); 

		}

			?>

		</section>