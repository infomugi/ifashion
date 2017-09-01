<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Design Template YII by Mugi Rachmat - www.infomugi.com">
    <meta name="author" content="Mugi Rachmat - infomugi@gmail.com">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/indexes/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/indexes/style.css" rel="stylesheet">    
    <body class="login">
        <?php echo $content; ?>
    </body>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/indexes/custom.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/indexes/bootstrap/js/bootstrap.min.js"></script>    
    </html>