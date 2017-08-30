<?php
/* @var $this UkuranController */
/* @var $model Ukuran */
$this->pageTitle='Edit Ukuran';
?>

<h2 class="header">Edit Ukuran #<?php echo $model->id_ukuran; ?></b><span class="header-line"></span></h2>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>