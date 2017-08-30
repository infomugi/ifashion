<?php
/* @var $this WarnaController */
/* @var $model Warna */
$this->pageTitle='Edit Warna';
?>

<h2 class="header">Edit Warna #<?php echo $model->id_warna; ?></b><span class="header-line"></span></h2>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>