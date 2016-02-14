<?php

/**
 * This is the model class for table "Alumno".
 *
 * The followings are the available columns in table 'Alumno':
 * @property integer $idAlumno
 * @property integer $identificacion
 * @property string $nombres
 * @property string $apellidos
 * @property integer $idUsuario
 *
 * The followings are the available model relations:
 * @property Usuario $idUsuario0
 * @property ElectivaAlumno[] $electivaAlumnos
 */
class Alumno extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'alumno';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('identificacion, nombres, apellidos, idUsuario', 'required'),
			array('identificacion, idUsuario', 'numerical', 'integerOnly'=>true),
			array('nombres, apellidos', 'length', 'max'=>60),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idAlumno, identificacion, nombres, apellidos, idUsuario', 'safe', 'on'=>'search'),
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
			'objUsuario' => array(self::BELONGS_TO, 'Usuario', 'idUsuario'),
                        'objElectivaAlumnos' => array(self::HAS_MANY, 'Usuario', 'idUsuario'),
			'listElectivaAlumnos' => array(self::HAS_MANY, 'ElectivaAlumno', 'idAlumno'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idAlumno' => 'Id Alumno',
			'identificacion' => 'Identificacion',
			'nombres' => 'Nombres',
			'apellidos' => 'Apellidos',
			'idUsuario' => 'Id Usuario',
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

		$criteria->compare('idAlumno',$this->idAlumno);
		$criteria->compare('identificacion',$this->identificacion);
		$criteria->compare('nombres',$this->nombres,true);
		$criteria->compare('apellidos',$this->apellidos,true);
		$criteria->compare('idUsuario',$this->idUsuario);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Alumno the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
