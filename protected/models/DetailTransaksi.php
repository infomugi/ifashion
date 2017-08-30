<?php

/**
 * This is the model class for table "detail_transaksi".
 *
 * The followings are the available columns in table 'detail_transaksi':
 * @property integer $id_detail_transaksi
 * @property string $tanggal
 * @property string $kode_barang 
 * @property integer $transaksi_id
 * @property integer $jumlah
 * @property integer $petugas_id
 */
class DetailTransaksi extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DetailTransaksi the static model class
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
		return 'detail_transaksi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tanggal, kode_barang, transaksi_id, jumlah, petugas_id', 'required'),
			array('id_detail_transaksi, transaksi_id, jumlah, petugas_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_detail_transaksi, tanggal, transaksi_id, jumlah, petugas_id', 'safe', 'on'=>'search'),
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
			'Barang'=>array(self::BELONGS_TO,'Barang','kode_barang'),
			'Transaksi'=>array(self::BELONGS_TO,'Transaksi','transaksi_id')
			);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_detail_transaksi' => 'Id Detail Transaksi',
			'tanggal' => 'Tanggal',
			'kode_barang' => 'Kode Barang',
			'transaksi_id' => 'Transaksi',
			'jumlah' => 'Jumlah',
			'petugas_id' => 'Petugas',
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

		$criteria->compare('id_detail_transaksi',$this->id_detail_transaksi);
		$criteria->compare('tanggal',$this->tanggal,true);
		$criteria->compare('transaksi_id',$this->transaksi_id);
		$criteria->compare('jumlah',$this->jumlah);
		$criteria->compare('petugas_id',$this->petugas_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			));
	}
}