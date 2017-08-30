<?php

/**
 * This is the model class for table "laporan".
 *
 * The followings are the available columns in table 'laporan':
 * @property string $tanggal_awal
 * @property string $tanggal_akhir
 * @property string $kategori
 * @property integer $id
 * @property string $status
 * @property string $by_name
 */
class Laporan extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Laporan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'laporan';
	}
	public function status()
    {
        return array(
			'Keluar'=>'Barang Keluar',
			'Masuk'=>'Barang Masuk',
		
			
           
            );
    }
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tanggal_awal, tanggal_akhir', 'required'),
			array('by_name','safe'),
			array('status','safe'),
			array('kategori','safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('tanggal_awal, tanggal_akhir, kategori, id, status, by_name', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'tanggal_awal' => 'Tanggal Awal',
			'tanggal_akhir' => 'Tanggal Akhir',
			'kategori' => 'Kategori',
			'id' => 'ID',
			'status' => 'Status',
			'by_name' => 'By Name',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('tanggal_awal',$this->tanggal_awal,true);
		$criteria->compare('tanggal_akhir',$this->tanggal_akhir,true);
		$criteria->compare('kategori',$this->kategori,true);
		$criteria->compare('id',$this->id);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('by_name',$this->by_name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}