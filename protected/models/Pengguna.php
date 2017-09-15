<?php

/**
 * This is the model class for table "pengguna".
 *
 * The followings are the available columns in table 'pengguna':
 * @property integer $idPengguna
 * @property string $nama_lengkap
 * @property string $username
 * @property string $password
 * @property string $email
 * @property integer $level
 * @property integer $status
 */
class Pengguna extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Pengguna the static model class
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
		return 'pengguna';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama_lengkap, username, password, email', 'required'),
			array('level, status', 'numerical', 'integerOnly'=>true),
			array('nama_lengkap, username, password', 'length', 'max'=>255),
			array('email', 'length', 'max'=>25),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idPengguna, nama_lengkap, username, password, email, level, status', 'safe', 'on'=>'search'),
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
			'idPengguna' => 'Kode Pengguna',
			'nama_lengkap' => 'Nama Lengkap',
			'username' => 'Username',
			'password' => 'Password',
			'email' => 'Email',
			'level' => 'Level',
			'status' => 'Status',
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

		$criteria->compare('idPengguna',$this->idPengguna);
		$criteria->compare('nama_lengkap',$this->nama_lengkap,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('level',$this->level);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			));
	}
}