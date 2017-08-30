<?php
$this->breadcrumbs=array(
	'Kategoris'=>array('index'),
	$model->id_kategori,
);
$dataBarang=new CActiveDataProvider('Barang', array(
	'criteria'=>array(
		'condition'=>'kategori = '.$model->id_kategori,
		'order'=>'nama_barang ASC'
		)
	));
$this->menu=array(
	array('label'=>'Tambah Kategori','url'=>array('create')),
	array('label'=>'Ubah Kategori','url'=>array('update','id'=>$model->id_kategori)),
	array('label'=>'Hapus Kategori','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_kategori),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Kelola Kategori','url'=>array('admin')),
);
?>

<h3>Data Kategori #<?php echo $model->nama_kategori; ?></h3>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		
		'nama_kategori',
	),
)); ?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'barang-grid',
	'dataProvider'=>$dataBarang,
	'columns'=>array(

		array(
			'header'=>'No',
			'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
			'htmlOptions'=>array('width'=>'10px', 
				'style' => 'text-align: center;')),

		array(
			'type' => 'raw',
			'value' => 'CHtml::image(Yii::app()->baseUrl ."/foto_produk/"."$data->gambar","", array("width"=>100, "height"=>100))',
			),

		array(
			'header'=>'Kategori',
			'value'=>'$data->Kategori->nama_kategori',
			),

		'nama_barang',
		'stok',

		),
		)); ?>

