<?php

/**
 * This is the model class for table "transaksi".
 *
 * The followings are the available columns in table 'transaksi':
 * @property integer $id_transaksi
 * @property string $tanggal
 * @property string $kode_transaksi
 * @property string $jenis_transaksi
 * @property integer $petugas_id
 * @property string $petugas_by 
 * @property string $status
 */
class Transaksi extends CActiveRecord
{
	public $nama_petugas;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Transaksi the static model class
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
		return 'transaksi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tanggal, kode_transaksi, jenis_transaksi,pelanggan_id', 'required','on'=>'penjualan'),
			array('tanggal, kode_transaksi, jenis_transaksi,supplier_id', 'required','on'=>'pembelian'),
			array('tanggal, kode_transaksi, jenis_transaksi,pelanggan_id, supplier_id', 'required','on'=>'retur'),
			array('petugas_id, supplier_id, pelanggan_id', 'numerical', 'integerOnly'=>true),
			array('kode_transaksi, jenis_transaksi, petugas_by, status', 'length', 'max'=>25),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_transaksi, tanggal, kode_transaksi, petugas_id, status', 'safe', 'on'=>'search'),
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
			'Supplier'=>array(self::BELONGS_TO,'Supplier','supplier_id'),
			'Pelanggan'=>array(self::BELONGS_TO,'Pelanggan','pelanggan_id'),
			);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_transaksi' => 'Transaksi ID',
			'tanggal' => 'Tanggal',
			'kode_transaksi' => 'Kode Transaksi',
			'jenis_transaksi' => 'Jenis Transaksi',
			'petugas_id' => 'Petugas ID',
			'nama_petugas' => 'Nama Petugas',
			'petugas_by' => 'Nama Petugas',
			'status' => 'Status',
			'supplier_id' => 'Supplier',
			'pelanggan_id' => 'Pelanggan',
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

		$criteria->compare('id_transaksi',$this->id_transaksi);
		$criteria->compare('tanggal',$this->tanggal,true);
		$criteria->compare('kode_transaksi',$this->kode_transaksi,true);
		$criteria->compare('jenis_transaksi',$this->jenis_transaksi,true);
		$criteria->compare('petugas_id',$this->petugas_id);
		$criteria->compare('status',$this->status);
		$criteria->order = "tanggal ASC";

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			));
	}

	public function generateTransactionCodeOut(){
		$_i = "P/".date('Ym')."/";
		$_left = $_i;
		$_first = "0000";
		$_len = strlen($_left);
		$no = $_left . $_first; 
		
		$last_po = $this->find( 
			array(
				"select"=>"kode_transaksi",
				"condition" => "left(kode_transaksi, " . $_len . ") = :_left",
				"params" => array(":_left" => $_left),
				"order" => "id_transaksi DESC"
				));
		
		if($last_po != null){
			$_no = substr($last_po->kode_transaksi, $_len);
			$_no++;
			$_no = substr("0000", strlen($_no)) . $_no;
			$no = $_left . $_no;
		}
		
		return $no;
	}	


	public function generateTransactionCodeAdd(){
		$_i = "M/".date('Ym')."/";
		$_left = $_i;
		$_first = "0000";
		$_len = strlen($_left);
		$no = $_left . $_first; 
		
		$last_po = $this->find( 
			array(
				"select"=>"kode_transaksi",
				"condition" => "left(kode_transaksi, " . $_len . ") = :_left",
				"params" => array(":_left" => $_left),
				"order" => "id_transaksi DESC"
				));
		
		if($last_po != null){
			$_no = substr($last_po->kode_transaksi, $_len);
			$_no++;
			$_no = substr("0000", strlen($_no)) . $_no;
			$no = $_left . $_no;
		}
		
		return $no;
	}	

	public function generateReturCode(){
		$_i = "R/".date('Ym')."/";
		$_left = $_i;
		$_first = "0000";
		$_len = strlen($_left);
		$no = $_left . $_first; 
		
		$last_po = $this->find( 
			array(
				"select"=>"kode_transaksi",
				"condition" => "left(kode_transaksi, " . $_len . ") = :_left",
				"params" => array(":_left" => $_left),
				"order" => "id_transaksi DESC"
				));
		
		if($last_po != null){
			$_no = substr($last_po->kode_transaksi, $_len);
			$_no++;
			$_no = substr("0000", strlen($_no)) . $_no;
			$no = $_left . $_no;
		}
		
		return $no;
	}				

	protected function beforeSave()
	{
		$this->tanggal = date('Y-m-d', strtotime($this->tanggal));
		return TRUE;
	}
	
	protected function afterFind()
	{
		$this->tanggal = date('Y-m-d', strtotime($this->tanggal));
		return TRUE;
	}    		

	public static function grandTotal($data){
		$sql = "
		SELECT sum(b.harga * d.jumlah) as total 
		FROM detail_transaksi as d 
		LEFT JOIN barang as b ON
		d.kode_barang=b.id_barang
		WHERE d.transaksi_id=".$data;
		$command = YII::app()->db->createCommand($sql);

		if($command->queryScalar()!=0){
			return $command->queryScalar();
		}else{
			return "0";
		}
	}

	public static function grandTotalDiscount($data){
		$sql = "
		SELECT sum((b.harga - 1000) * d.jumlah) as total 
		FROM detail_transaksi as d 
		LEFT JOIN barang as b ON
		d.kode_barang=b.id_barang
		WHERE d.transaksi_id=".$data;
		$command = YII::app()->db->createCommand($sql);

		if($command->queryScalar()!=0){
			return $command->queryScalar();
		}else{
			return "0";
		}
	}	

	public function rupiah($data){
		return "Rp. " . Yii::app()->numberFormatter->format("###,###,###",$data);
	}

}