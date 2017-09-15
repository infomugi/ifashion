<?php

/**
 * This is the model class for table "barang".
 *
 * The followings are the available columns in table 'barang':
 * @property integer $id_barang
 * @property string $kode_barang
 * @property string $nama_barang
 * @property integer $kategori
 * @property integer $stok
 * @property integer $stok_minimum
 * @property string $gambar
 * @property string $keterangan_produk
 * @property double $harga_beli
 * @property double $harga
 * @property integer $warna
 * @property integer $ukuran
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Kategori $kategori0
 */
class Barang extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'barang';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kode_barang, nama_barang, kategori, stok, stok_minimum, harga_beli, harga, warna, ukuran, status, gambar', 'required'),
			array('kategori, stok, stok_minimum, warna, ukuran, status', 'numerical', 'integerOnly'=>true),
			array('harga_beli, harga', 'numerical'),
			array('kode_barang', 'length', 'max'=>10),
			array('nama_barang', 'length', 'max'=>50),
			array('kategori, stok', 'match' ,'pattern'=>'/^[0-9]+$/u'),
			array('kode_barang','unique'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_barang, kode_barang, nama_barang, kategori, stok, stok_minimum, gambar, keterangan_produk, harga_beli, harga, warna, ukuran, status', 'safe', 'on'=>'search'),
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
			'Kategori' => array(self::BELONGS_TO, 'Kategori', 'kategori'),
			'Warnas' => array(self::BELONGS_TO, 'Warna', 'warna'),
			'Ukurans' => array(self::BELONGS_TO, 'Ukuran', 'ukuran'),
			);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_barang' => 'Kode Barang',
			'kode_barang' => 'Kode Barang',
			'nama_barang' => 'Nama Barang',
			'kategori' => 'Kategori',
			'stok' => 'Stok',
			'stok_minimum' => 'Stok Minimum',
			'gambar' => 'Gambar',
			'keterangan_produk' => 'Keterangan Produk',
			'harga_beli' => 'Harga Beli',
			'harga' => 'Harga',
			'warna' => 'Warna',
			'ukuran' => 'Ukuran',
			'status' => 'Status',
			);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_barang',$this->id_barang);
		$criteria->compare('kode_barang',$this->kode_barang,true);
		$criteria->compare('nama_barang',$this->nama_barang,true);
		$criteria->compare('kategori',$this->kategori);
		$criteria->compare('stok',$this->stok);
		$criteria->compare('stok_minimum',$this->stok_minimum);
		$criteria->compare('gambar',$this->gambar,true);
		$criteria->compare('keterangan_produk',$this->keterangan_produk,true);
		$criteria->compare('harga_beli',$this->harga_beli);
		$criteria->compare('harga',$this->harga);
		$criteria->compare('warna',$this->warna);
		$criteria->compare('ukuran',$this->ukuran);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Barang the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function check($stock,$minimum){
		if($stock <= $minimum){
			return "Stok Hampir Habis, Harap Segera dilakukan Pengadaan";
		}else{
			return "Stok Stabil";
		}
	}
}
