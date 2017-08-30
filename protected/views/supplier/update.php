<?php
/* @var $this SupplierController */
/* @var $model Supplier */
$this->pageTitle='Edit Supplier';
?>

<h2 class="header">Edit Supplier #<?php echo $model->id_supplier; ?></b><span class="header-line"></span></h2>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>