<?php

class DetailTransaksiController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
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
				'actions'=>array('create','update','view','delete','admin','index','addin','addout','addretur'),
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

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionAddIn($id)
	{
		$model=new DetailTransaksi;
		$model2=new Barang('search');
		$model2->unsetAttributes();  // clear any default values
		if(isset($_GET['Barang']))
			$model2->attributes=$_GET['Barang'];

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['DetailTransaksi']))
		{
			$model->attributes=$_POST['DetailTransaksi'];
			$model->transaksi_id = $id;
			$model->tanggal = date('Y-m-d');
			$model->petugas_id = YII::app()->user->id;

			if($model->jumlah=='' && $model->kode_barang==''){
				echo '<script>alert("Data Harus diisi");window.location="index.php?r=detailtransaksi/addout&id='.$id.'"</script>';
			}else{
				$model->save();

				$update=$this->loadBarang($model->kode_barang);
				$update->stok += $model->jumlah;
				$update->update();

				$this->redirect(array('transaksi/viewin','id'=>$id));
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'model2'=>$model2,
			));
	}


	public function actionAddOut($id)
	{
		$model=new DetailTransaksi;
		$model2=new Barang('search');
		$model2->unsetAttributes();  // clear any default values
		if(isset($_GET['Barang']))
			$model2->attributes=$_GET['Barang'];

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['DetailTransaksi']))
		{
			$model->attributes=$_POST['DetailTransaksi'];
			$model->transaksi_id = $id;
			$model->tanggal = date('Y-m-d');
			$model->petugas_id = YII::app()->user->id;

			$Barang=Barang::model()->findByPk($model->kode_barang);
			if($model->jumlah > $Barang->stok ){
				echo '<script>alert("Maaf, Barang tidak dapat dikeluarkan, Sisa Stok di Gudang '.$Barang->stok.' Pcs");window.location="index.php?r=detailtransaksi/addout&id='.$id.'"</script>';
			}
			elseif($model->jumlah=='' && $model->kode_barang==''){
				echo '<script>alert("Data Harus diisi");window.location="index.php?r=detailtransaksi/addout&id='.$id.'"</script>';
			}else{
				if($model->save());

				$update=$this->loadBarang($model->kode_barang);
				$update->stok -= $model->jumlah;
				$update->update();

				$this->redirect(array('transaksi/viewout','id'=>$id));
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'model2'=>$model2,
			));
	}


	public function actionAddRetur($id)
	{
		$model=new DetailTransaksi;
		$model2=new Barang('search');
		$model2->unsetAttributes();  // clear any default values
		if(isset($_GET['Barang']))
			$model2->attributes=$_GET['Barang'];

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['DetailTransaksi']))
		{
			$model->attributes=$_POST['DetailTransaksi'];
			$model->transaksi_id = $id;
			$model->tanggal = date('Y-m-d');
			$model->petugas_id = YII::app()->user->id;

			$Barang=Barang::model()->findByPk($model->kode_barang);
			if($model->jumlah > $Barang->stok ){
				echo '<script>alert("Maaf, Barang tidak dapat dikeluarkan, Sisa Stok di Gudang '.$Barang->stok.' Pcs");window.location="index.php?r=detailtransaksi/addout&id='.$id.'"</script>';
			}
			elseif($model->jumlah=='' && $model->kode_barang==''){
				echo '<script>alert("Data Harus diisi");window.location="index.php?r=detailtransaksi/addout&id='.$id.'"</script>';
			}else{
				if($model->save());

				$update=$this->loadBarang($model->kode_barang);
				$update->stok += $model->jumlah;
				$update->update();

				$this->redirect(array('transaksi/viewretur','id'=>$id));
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'model2'=>$model2,
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
		$model2=new Barang('search');
		$model2->unsetAttributes();  // clear any default values
		if(isset($_GET['Barang']))
			$model2->attributes=$_GET['Barang'];

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['DetailTransaksi']))
		{
			$model->attributes=$_POST['DetailTransaksi'];
			if($model->save()){
				$this->redirect(array('transaksi/viewin','id'=>$id));
			}
		}

		$this->render('update',array(
			'model'=>$model,
			'model2'=>$model2,
			));
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
		$dataProvider=new CActiveDataProvider('DetailTransaksi');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new DetailTransaksi('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['DetailTransaksi']))
			$model->attributes=$_GET['DetailTransaksi'];

		$this->render('admin',array(
			'model'=>$model,
			));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return DetailTransaksi the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=DetailTransaksi::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadBarang($id)
	{
		$model=Barang::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}	

	/**
	 * Performs the AJAX validation.
	 * @param DetailTransaksi $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='detail-transaksi-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
