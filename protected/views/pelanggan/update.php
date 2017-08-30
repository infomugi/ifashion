<?php
/* @var $this PelangganController */
/* @var $model Pelanggan */
$this->pageTitle='Edit Pelanggan';
?>

<h2 class="header">Edit Pelanggan #<?php echo $model->id_pelanggan; ?></b><span class="header-line"></span></h2>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>