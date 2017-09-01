<?php

/**
 * This is the model class for table "retur_transaksi".
 *
 * The followings are the available columns in table 'retur_transaksi':
 * @property integer $id_retur_transaksi
 * @property string $tanggal
 * @property string $kode_barang
 * @property integer $transaksi_id
 * @property integer $detail_transaksi_id
 * @property string $type
 * @property integer $jumlah
 * @property integer $status
 * @property string $petugas_id
 */
class ReturTransaksi extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ReturTransaksi the static model class
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
		return 'retur_transaksi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tanggal, kode_barang, transaksi_id, detail_transaksi_id, type, jumlah, status, petugas_id', 'required'),
			array('transaksi_id, detail_transaksi_id, jumlah, status', 'numerical', 'integerOnly'=>true),
			array('kode_barang, type, petugas_id', 'length', 'max'=>25),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_retur_transaksi, tanggal, kode_barang, transaksi_id, detail_transaksi_id, type, jumlah, status, petugas_id', 'safe', 'on'=>'search'),
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
			'Transaksi'=>array(self::BELONGS_TO,'Transaksi','transaksi_id'),
			'DetailTransaksi'=>array(self::BELONGS_TO,'DetailTransaksi','detail_transaksi_id'),
			'Barang'=>array(self::BELONGS_TO,'Barang','kode_barang'),
			'Petugas'=>array(self::BELONGS_TO,'Petugas','petugas_id'),

			);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_retur_transaksi' => 'Id Laporan Transaksi',
			'tanggal' => 'Tanggal Laporan',
			'kode_barang' => 'Kode Barang',
			'transaksi_id' => 'Transaksi',
			'detail_transaksi_id' => 'Detail Transaksi',
			'type' => 'Tipe Laporan',
			'jumlah' => 'Jumlah',
			'status' => 'Status',
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

		$criteria->compare('id_retur_transaksi',$this->id_retur_transaksi);
		$criteria->compare('tanggal',$this->tanggal,true);
		$criteria->compare('kode_barang',$this->kode_barang,true);
		$criteria->compare('transaksi_id',$this->transaksi_id);
		$criteria->compare('detail_transaksi_id',$this->detail_transaksi_id);
		$criteria->compare('type',$this->type);
		$criteria->compare('jumlah',$this->jumlah);
		$criteria->compare('status',$this->status);
		$criteria->compare('petugas_id',$this->petugas_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			));
	}

	public function status($data){
		if($data==1){
			return "Verifikasi";
		}else if($data==1){
			return "Sudah di Kembalikan ke Supplier";
		}else{
			return "Belum di Verifikasi";
		}
	}
}