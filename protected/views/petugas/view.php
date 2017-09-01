<?php
/* @var $this PetugasController */
/* @var $model Petugas */
$this->pageTitle='Detail Petugas';

$this->menu=array(
	array('label'=>'Daftar Petugas', 'url'=>array('index')),
	array('label'=>'Kelola Petugas', 'url'=>array('admin')),
	);
	?>

	<?php echo CHtml::link('Edit', 
		array('update', 'id'=>$model->kode_petugas,
			), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Petugas'));
			?>
			

			<HR>

				<?php $this->widget('zii.widgets.CDetailView', array(
					'data'=>$model,
					'htmlOptions'=>array("class"=>"table "),
					'attributes'=>array(
						'kode_petugas',
						'username',
						'password',
						'email',
						'level',
						),
						)); ?>

				<STYLE>
					th{width:300px;}
				</STYLE>
