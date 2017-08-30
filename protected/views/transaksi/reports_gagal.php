<?php
/* @var $this TransaksiController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Transaksi',
	);

$this->pageTitle='Report Transaksi - ';//$jenisTransaksi;
?>

<section class="col-xs-12">

	Dari Tanggal : <b><?php echo($from);?></b> s/d <b><?php echo($until);?></b> - Jenis : <b><?php echo($jenisTransaksi); ?></b> - Status : <b><?php echo($statusTransaksi); ?></b>
	<hr>

<table border="1" class="table table-bordered">
<tr>
<th>Kode barang</th>
<th>Nama barang</th>
<th>kategori barang</th>
<th>Keluar barang</th>
<th>Tanggal</th>
</tr>
<?php 
mysql_connect("localhost","root","");
mysql_select_db("eternity");
	    $cetak=mysql_query("SELECT barang.*,detail_transaksi.*,kategori.* FROM barang
		INNER JOIN detail_transaksi on detail_transaksi.kode_barang=barang.kode_barang 
		INNER JOIN kategori on kategori.id_kategori=barang.kategori 
		where detail_transaksi.tanggal between '$from' and '$until' group by barang.kode_barang") or die (mysql_error());
		while($tampil=mysql_fetch_object($cetak)){
			
			echo '
			<tr>
			<td>'.$tampil->kode_barang.'</td>
			<td>'.$tampil->nama_barang.'</td>
			<td>'.$tampil->nama_kategori.'</td>
			';
			$sumk=mysql_query("select sum(jumlah) from detail_transaksi where kode_barang='$tampil->kode_barang'");
			$hasilsummasuk=mysql_fetch_array($sumk);
			$getsummasuk=$hasilsummasuk[0];
			
			$summ=mysql_query("select sum(jumlah) from detail_transaksi where kode_barang='$tampil->kode_barang'");
			$hasilsumkeluar=mysql_fetch_array($summ);
			$getsumkeluar=$hasilsumkeluar[0];
			echo'
			<td>'.$getsumkeluar.'</td>
			<td>'.$tampil->tanggal.'</td>
			
			</tr>
			
			
			';
			
			
		}


?>
</table>

	</section>