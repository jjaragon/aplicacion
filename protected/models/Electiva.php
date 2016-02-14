<?php

/**
 * This is the model class for table "Electiva".
 *
 * The followings are the available columns in table 'Electiva':
 * @property integer $idElectiva
 * @property string $descripcion
 * @property integer $idProfesor
 * @property integer $cuposDisponibles
 *
 * The followings are the available model relations:
 * @property Profesor $idProfesor0
 * @property ElectivaAlumno[] $electivaAlumnos
 */
class Electiva extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'electiva';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('descripcion, idProfesor, cuposDisponibles', 'required'),
			array('idProfesor, cuposDisponibles', 'numerical', 'integerOnly'=>true),
			array('descripcion', 'length', 'max'=>120),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idElectiva, descripcion, idProfesor, cuposDisponibles', 'safe', 'on'=>'search'),
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
			'objProfesor' => array(self::BELONGS_TO, 'Profesor', 'idProfesor'),
			'listElectivaAlumnos' => array(self::HAS_MANY, 'ElectivaAlumno', 'idElectiva'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idElectiva' => 'Id Electiva',
			'descripcion' => 'Descripcion',
			'idProfesor' => 'Id Profesor',
			'cuposDisponibles' => 'Cupos Disponibles',
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

		$criteria->compare('idElectiva',$this->idElectiva);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('idProfesor',$this->idProfesor);
		$criteria->compare('cuposDisponibles',$this->cuposDisponibles);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Electiva the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
