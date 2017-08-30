<?php

class ReturTransaksiController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			//'postOnly + delete', // we only allow deletion via POST request
			// 'rights',
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',
				'actions'=>array('create','update','view','delete','admin','index','addin','addout','verifikasi','printin'),
				'users'=>array('@'),
				'expression'=>'Yii::app()->user->record->level==1',
				),
			array('allow',
				'actions'=>array('view','index'),
				'users'=>array('@'),
				'expression'=>'Yii::app()->user->record->level==3',
				),			
			array('deny',
				'users'=>array('*'),
				),
			);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}


	public function actionPrintin($id)
	{
		$this->layout = "print";
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($tid,$dtid,$item,$ktrs,$tgl)
	{
		$model=new ReturTransaksi;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ReturTransaksi']))
		{
			$model->attributes=$_POST['ReturTransaksi'];
			$model->transaksi_id = $tid;
			$model->detail_transaksi_id = $dtid;
			$model->kode_barang = $item;
			$model->status = 0;
			$model->tanggal = date('Y-m-d');
			$model->petugas_id = YII::app()->user->id;

			$Barang=Barang::model()->findByPk($model->kode_barang);
			if($model->jumlah > $Barang->stok ){
				echo '<script>alert("Maaf, Barang tidak dapat dikeluarkan, Sisa Stok di Gudang '.$Barang->stok.' Pcs");window.location="index.php?r=detailtransaksi/addout&id='.$id.'"</script>';
			}
			elseif($model->jumlah=='' && $model->kode_barang==''){
				echo '<script>alert("Data Harus diisi");window.location="index.php?r=returtransaksi/create&id='.$id.'"</script>';
			}else{
				if($model->save());
				$this->redirect(array('detailtransaksi/view','id'=>$dtid));
		}
		}

		$this->render('create',array(
			'model'=>$model,
			'item'=>$item,
			'tid'=>$tid,
			'dtid'=>$dtid,
			'ktrs'=>$ktrs,
			'tgl'=>$tgl
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ReturTransaksi']))
		{
			$model->attributes=$_POST['ReturTransaksi'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_retur_transaksi));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionVerifikasi($id)
	{
		$model=$this->loadModel($id);
		$model->status = 1;
		$model->save();
		mysql_connect("localhost","root","");
		mysql_select_db("eternity");
		$validasistok=mysql_query("select stok from barang where kode_barang='$model->kode_barang'");
		$getstok=mysql_fetch_object($validasistok);
		$proseskurang=$getstok->stok - $model->jumlah;
		mysql_query("UPDATE `barang` SET `stok` = '$proseskurang' WHERE `kode_barang` = '$model->kode_barang'");
		$this->redirect(array('view','id'=>$model->id_retur_transaksi));
	}


	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('ReturTransaksi');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ReturTransaksi('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ReturTransaksi']))
			$model->attributes=$_GET['ReturTransaksi'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ReturTransaksi the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=ReturTransaksi::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ReturTransaksi $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='retur-transaksi-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
