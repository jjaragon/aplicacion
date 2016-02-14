<?php

/**
 * This is the model class for table "electivaalumno".
 *
 * The followings are the available columns in table 'electivaalumno':
 * @property integer $idAlumno
 * @property integer $idElectiva
 * @property string $fechaInscripcion
 * @property integer $estado
 *
 * The followings are the available model relations:
 * @property Electiva $idElectiva0
 * @property Alumno $idAlumno0
 */
class ElectivaAlumno extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'electivaalumno';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idAlumno, idElectiva, fechaInscripcion, estado', 'required'),
			array('idAlumno, idElectiva, estado', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idAlumno, idElectiva, fechaInscripcion, estado', 'safe', 'on'=>'search'),
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
			'objElectiva' => array(self::BELONGS_TO, 'Electiva', 'idElectiva'),
			'objAlumno' => array(self::BELONGS_TO, 'Alumno', 'idAlumno'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idAlumno' => 'Id Alumno',
			'idElectiva' => 'Id Electiva',
			'fechaInscripcion' => 'Fecha Inscripcion',
			'estado' => 'Estado',
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
		$criteria->compare('idElectiva',$this->idElectiva);
		$criteria->compare('fechaInscripcion',$this->fechaInscripcion,true);
		$criteria->compare('estado',$this->estado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ElectivaAlumno the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
