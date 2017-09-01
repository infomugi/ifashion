<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<meta name="language" content="en" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.css" />
</head>
<body>
	<STYLE>
		#cetak{width:350px;padding: 5px;}
	</STYLE>

	<div id="cetak">
		<header>
			<h3><center><?php echo YII::app()->name; ?></center></h3>
			<p><center><b>Jl. Raya Soekarno Hatta No.456 Bandung</b></center></p>
			<HR>
			</header>
			<?php echo $content ?>
		</div>

	</body>
	</html>
