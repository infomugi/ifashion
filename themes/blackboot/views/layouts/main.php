		<!DOCTYPE html>
		<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title><?php echo CHtml::encode($this->pageTitle); ?></title>
			<meta name="language" content="en" />
			<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.css" />
			<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap-responsive.css" />
			<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css" />

		</head>

		<body>



			<div class="navbar navbar-inverse navbar-fixed-top">

				<div class="navbar-inner">

					<div class="container-fluid">
						<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</a>
						<div class="nav-collapse">

							<!-- <img src="./indexes/images/header.jpg" style="width:100%;height:130px"> -->
							<?php 
							if(Yii::app()->user->record->level==1){
								$this->widget('zii.widgets.CMenu',array(
									'htmlOptions' => array( 'class' => 'nav' ),
									'activeCssClass'=> 'active',
									'items'=>array(
										array('label'=>'Beranda', 'url'=>array('/site/index')),
										array('label'=>'Stock Opname', 'url'=>array('/site/stockofname')),
										array('label'=>'Kategori', 'url'=>array('/kategori/admin'), 'visible'=>!Yii::app()->user->isGuest),
										array('label'=>'Barang', 'url'=>array('/barang/admin'), 'visible'=>!Yii::app()->user->isGuest),
										array('label'=>'Barang Masuk', 'url'=>array('/transaksi/in'), 'visible'=>!Yii::app()->user->isGuest),
										array('label'=>'Penjualan', 'url'=>array('/transaksi/out'), 'visible'=>!Yii::app()->user->isGuest),
										array('label'=>'Retur', 'url'=>array('/transaksi/retur'), 'visible'=>!Yii::app()->user->isGuest),
										array('label'=>'Laporan', 'url'=>array('/site/report'), 'visible'=>!Yii::app()->user->isGuest),
										array('label'=>'Petugas', 'url'=>array('/petugas/admin'), 'visible'=>!Yii::app()->user->isGuest),
										array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
										array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
										),
									)); 
							}else{

								$this->widget('zii.widgets.CMenu',array(
									'htmlOptions' => array( 'class' => 'nav' ),
									'activeCssClass'=> 'active',
									'items'=>array(
										array('label'=>'Beranda', 'url'=>array('/site/index')),
										array('label'=>'Laporan', 'url'=>array('/site/report'), 'visible'=>!Yii::app()->user->isGuest),
										array('label'=>'Profile', 'url'=>array('/petugas/view&id='.YII::app()->user->id), 'visible'=>!Yii::app()->user->isGuest),
										array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
										array('label'=>'Bantuan', 'url'=>array('/site/help')),
										array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
										),
									)); 
							}

							?>

						</div><!--/.nav-collapse -->
					</div>
				</div>
			</div>

			<div class="cont">
				<div class="container-fluid">

					<BR>
						<BR>

							<?php echo $content ?>

						</div><!--/.fluid-container-->
					</div>



					<?php
					Yii::app()->clientscript
		// use it when you need it!
					->registerCoreScript( 'jquery' )
					->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap.js', CClientScript::POS_END )
					?>


				</body>

				</html>
