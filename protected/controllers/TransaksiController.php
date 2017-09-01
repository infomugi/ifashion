<?php

class TransaksiController extends Controller
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
			// 'postOnly + delete', // we only allow deletion via POST request
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
				'actions'=>array(
					'create','update','view','delete','admin',
					'index','in','out','addbarang','outbarang',
					'viewin','viewout','printin','printout',
					'verifikasi','laporan','returbarang','viewretur',
					'printretur','retur',
					),
				'users'=>array('@'),
				'expression'=>'Yii::app()->user->record->level==1',
				),
			array('allow',
				'actions'=>array(
					'create','update','view','admin',
					'index','in','out','addbarang','outbarang',
					'viewin','viewout','printin','printout',
					'verifikasi','laporan','returbarang','viewretur',
					'printretur','retur',
					),
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
	public function actionViewout($id)
	{
		$this->render('viewout',array(
			'model'=>$this->loadModel($id),
			));
	}

	public function actionViewin($id)
	{
		$this->render('viewin',array(
			'model'=>$this->loadModel($id),
			));
	}

	public function actionPrintout($id)
	{
		$this->layout = "print_faktur";
		$this->render('printout',array(
			'model'=>$this->loadModel($id),
			));
	}

	public function actionPrintretur($id)
	{
		$this->layout = "print";
		$this->render('printretur',array(
			'model'=>$this->loadModel($id),
			));
	}	

	public function actionViewretur($id)
	{
		$this->render('viewretur',array(
			'model'=>$this->loadModel($id),
			));
	}	

	public function actionPrintin($id)
	{
		$this->layout = "print";
		$this->render('printin',array(
			'model'=>$this->loadModel($id),
			));
	}	


	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionAddBarang()
	{
		$model=new Transaksi;
		$model->setScenario('pembelian');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Transaksi']))
		{
			$model->attributes=$_POST['Transaksi'];
			$model->petugas_id = YII::app()->user->id;
			$model->petugas_by = YII::app()->user->name;
			$model->jenis_transaksi = "Barang Masuk";
			$model->status = "Belum di Verifikasi";	
			$model->pelanggan_id = 0;		
			if($model->save())
				$this->redirect(array('viewin','id'=>$model->id_transaksi));
		}

		$this->render('add_barang',array(
			'model'=>$model,
			));
	}


	public function actionReturBarang()
	{
		$model=new Transaksi;
		$model->setScenario('retur');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Transaksi']))
		{
			$model->attributes=$_POST['Transaksi'];
			$model->petugas_id = YII::app()->user->id;
			$model->petugas_by = YII::app()->user->name;
			$model->jenis_transaksi = "Barang Retur";
			$model->status = "Belum di Verifikasi";		
			if($model->save()){
				$this->redirect(array('viewretur','id'=>$model->id_transaksi));
			}
		}

		$this->render('retur_barang',array(
			'model'=>$model,
			));
	}	


	public function actionOutBarang()
	{
		$model=new Transaksi;
		$model->setScenario('penjualan');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Transaksi']))
		{
			$model->attributes=$_POST['Transaksi'];
			$model->petugas_id = YII::app()->user->id;
			$model->petugas_by = YII::app()->user->name;
			$model->jenis_transaksi = "Barang Keluar";
			$model->status = "Belum di Verifikasi";		
			$model->supplier_id = 0;			
			if($model->save()){
				$this->redirect(array('viewout','id'=>$model->id_transaksi));
			}
		}

		$this->render('out_barang',array(
			'model'=>$model,
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

		if(isset($_POST['Transaksi']))
		{
			$model->attributes=$_POST['Transaksi'];
			$model->petugas_id = YII::app()->user->id;
			$model->status = 0;
			
			if($model->save()){
				$this->redirect(array('view','id'=>$model->id_transaksi));
			}
		}

		$this->render('update',array(
			'model'=>$model,
			));
	}

	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Transaksi');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
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
		$model=DetailTransaksi::model()->findAll(array('condition' => 'transaksi_id='.$id.''));
		$model->delete();
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIn()
	{
		$dataProvider=new CActiveDataProvider('Transaksi', array(
			'criteria'=>array(
				'condition'=>'jenis_transaksi = "Barang Masuk"',
				'order'=>'tanggal DESC'
				)
			));

		$this->render('index_instock',array(
			'dataProvider'=>$dataProvider,
			));
	}	


	public function actionOut()
	{
		$dataProvider=new CActiveDataProvider('Transaksi', array(
			'criteria'=>array(
				'condition'=>'jenis_transaksi = "Barang Keluar"',
				'order'=>'tanggal DESC'
				)));

		$this->render('index_outstock',array(
			'dataProvider'=>$dataProvider,
			));
	}	

	public function actionRetur()
	{
		$dataProvider=new CActiveDataProvider('Transaksi', array(
			'criteria'=>array(
				'condition'=>'jenis_transaksi = "Barang Retur"',
				'order'=>'tanggal DESC'
				)));

		$this->render('index_returstock',array(
			'dataProvider'=>$dataProvider,
			));
	}		

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Transaksi('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Transaksi']))
			$model->attributes=$_GET['Transaksi'];

		$this->render('admin',array(
			'model'=>$model,
			));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Transaksi the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Transaksi::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Transaksi $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='transaksi-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionVerifikasi($id)
	{
		$model=$this->loadModel($id);
		$model->petugas_id = YII::app()->user->id;
		$model->status = "Verifikasi";
		if($model->pelanggan_id==1){
			$model->total = Transaksi::model()->grandTotal($model->id_transaksi);
		}else{
			$model->total = Transaksi::model()->grandTotalDiscount($model->id_transaksi);
		}
		$model->save();
		if($model->jenis_transaksi=="Barang Masuk"){
			$this->redirect(array('viewin','id'=>$model->id_transaksi));
		}else if($model->jenis_transaksi=="Barang Keluar"){
			$this->redirect(array('viewout','id'=>$model->id_transaksi));
		}else{
			$this->redirect(array('viewretur','id'=>$model->id_transaksi));
		}
	}	

	public function actionLaporan()
	{
		$this->layout = "print";
		$from=$_REQUEST['startDate'];
		$until=$_REQUEST['endDate'];
		$statusTransaksi=$_REQUEST['status'];
		$jenisTransaksi=$_REQUEST['jenis'];
		$jenisReport=$_REQUEST['jenisreport'];

		$tampa = "'%"."$from"."%'";
		$tampb = "'%"."$until"."%'";
		$status = "'%"."$statusTransaksi"."%'";
		$jenis = "'%"."$jenisTransaksi"."%'";
		$report = "'%"."$jenisReport"."%'";


		$dataProvider = new CActiveDataProvider('Transaksi', array(
			'criteria' => array(
				'condition'=>'tanggal >= ' . $tampa . ' AND tanggal <= ' . $tampb . ' AND status='. $status . ' AND jenis_transaksi='.$jenis,
				'order'=>'tanggal ASC'
				),
			'pagination'=>array(
				'pageSize'=>1000
				)
			));

		$this->render('laporanTransaksi',array(
			'dataProvider'=>$dataProvider,
			'from'=>$from, 
			'until'=>$until,
			'statusTransaksi'=>$statusTransaksi,
			'jenisTransaksi'=>$jenisTransaksi,
			'jenisReport'=>$jenisReport,
			'tampa'=>$tampa,
			'tampb'=>$tampb,
			'status'=>$status,
			'jenis'=>$jenis,
			));

	}		
}
