<?php

class BarangController extends Controller
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
				'actions'=>array('create','update','view','delete','admin','index','stockofname'),
				'users'=>array('@'),
				// 'expression'=>'Yii::app()->user->profile->level==1',
				),
			array('allow',
				'actions'=>array('view','index'),
				'users'=>array('@'),
				// 'expression'=>'Yii::app()->user->profile->level==3',
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
	public function actionCreate()
	{
		$model=new Barang;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Barang']))
		{
			$model->attributes=$_POST['Barang'];
			// $model->gambar=CUploadedFile::getInstance($model,'gambar');
			$tmp;
			if(strlen(trim(CUploadedFile::getInstance($model,'gambar'))) > 0) 
			{ 
				$tmp=CUploadedFile::getInstance($model,'gambar'); 
				$model->gambar=$model->kode_barang.'.'.$tmp->extensionName; 
			}
			if($model->save())
			{
				if(strlen(trim($model->gambar)) > 0) {
					$tmp->saveAs(Yii::getPathOfAlias('webroot').'/file/produk/'.$model->gambar);				
				}

				$this->redirect(array('view','id'=>$model->id_barang));
			}
		}

		$this->render('create',array(
			'model'=>$model,
			));
	}

	public function actionStockOfName($string=''){
		$criteria = new CDbCriteria();
		if(strlen($string)>0)
			$criteria->addSearchCondition('kode_barang', $string, true, 'OR');
		$criteria->addSearchCondition('nama_barang', $string, true, 'OR');
		$criteria->addSearchCondition('kategori', $string, true, 'OR');
		$criteria->addSearchCondition('stok', $string, true, 'OR');
		$dataProvider = new CActiveDataProvider('Barang', array('criteria'=>$criteria));
		$this->render('index', array('dataProvider'=>$dataProvider));		
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

		if(isset($_POST['Barang']))
		{
			$model->attributes=$_POST['Barang'];
			// $model->gambar=CUploadedFile::getInstance($model,'gambar');
			$tmp;
			if(strlen(trim(CUploadedFile::getInstance($model,'gambar'))) > 0) 
			{ 
				$tmp=CUploadedFile::getInstance($model,'gambar'); 
				$model->gambar=$model->kode_barang.'.'.$tmp->extensionName; 
			}
			if($model->save())
			{
				if(strlen(trim($model->gambar)) > 0) {
					$tmp->saveAs(Yii::getPathOfAlias('webroot').'/file/produk/'.$model->gambar);				
				}
				$this->redirect(array('view','id'=>$model->id_barang));
			}
		}

		$this->render('update',array(
			'model'=>$model,
			));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Barang');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Barang('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Barang']))
			$model->attributes=$_GET['Barang'];

		$this->render('admin',array(
			'model'=>$model,
			));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Barang::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='barang-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
