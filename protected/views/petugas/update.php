<?php
/* @var $this PetugasController */
/* @var $model Petugas */
$this->pageTitle='Edit Petugas';
?>

<h2 class="header">Edit Petugas #<?php echo $model->kode_petugas; ?></b><span class="header-line"></span></h2>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>