<?php
/* @var $this PelangganController */
/* @var $dataProvider CActiveDataProvider */
$this->pageTitle='Daftar Pelanggan';
$this->breadcrumbs=array(
	'Pelanggans',
	);

$this->menu=array(
	array('label'=>'Tambah Pelanggan', 'url'=>array('create')),
	array('label'=>'Kelola Pelanggan', 'url'=>array('admin')),
	);
	?>

	<span class="hidden-xs">

		<?php echo CHtml::link('Tambah Pelanggan',
			array('create'),
			array('class' => 'btn btn-primary btn-flat'));
			?>
			<?php echo CHtml::link('Kelola Pelanggan',
				array('admin'),
				array('class' => 'btn btn-primary btn-flat'));
				?>

			</span>	

			<HR>
				<?php $this->widget('zii.widgets.CListView', array(
					'dataProvider'=>$dataProvider,
					'itemView'=>'_view',
					)); ?>
