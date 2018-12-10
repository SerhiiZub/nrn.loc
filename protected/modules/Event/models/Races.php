<?php

/**
 * This is the model class for table "{{races}}".
 *
 * The followings are the available columns in table '{{races}}':
 * @property string $id
 * @property string $event_id
 * @property string $title
 * @property string $description
 * @property string $start_number_prefix
 * @property integer $status
 * @property string $type_Id
 * @property string $age_category_id
 * @property string $create_user_id
 * @property string $update_user_id
 * @property string $create_time
 * @property string $update_time
 * @property string $image
 */
class Races extends yupe\models\YModel
//class Races extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{races}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('event_id, title, type_Id, age_category_id, start_number_prefix', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('event_id, type_Id, age_category_id, create_user_id, update_user_id', 'length', 'max'=>11),
			array('title', 'length', 'max'=>150),
			array('start_number_prefix', 'length', 'max'=>10),
			array('image', 'length', 'max'=>300),
			array('description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, event_id, title, description, status, type_Id, age_category_id, create_user_id, update_user_id, create_time, update_time, image', 'safe', 'on'=>'search'),
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
		    'types' => [self::HAS_ONE, 'RaceType', 'type_Id`'],
		    'ages' => [self::HAS_ONE, 'RaceAgeCategory', 'age_category_id'],
		    'userCreated' => [self::HAS_ONE, 'User', 'create_user_id'],
		    'userUpdate' => [self::HAS_ONE, 'User', 'update_user_id'],
		    'event' => [self::BELONGS_TO, 'Event', 'event_id'],
		    'members' => [self::HAS_MANY, 'EventMembers', ['race_id', 'event_id']],
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'event_id' => 'Event',
			'title' => 'заголовок',
			'description' => 'описание',
			'start_number_prefix' => 'префикс номера участника',
			'status' => 'статус',
			'type_Id' => 'тип забега',
			'age_category_id' => 'возрастная категория',
			'create_user_id' => 'Create User',
			'update_user_id' => 'Update User',
			'create_time' => 'Create Time',
			'update_time' => 'Update Time',
			'image' => 'изображение',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('event_id',$this->event_id,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('start_number_prefix',$this->start_number_prefix,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('type_Id',$this->type_Id,true);
		$criteria->compare('age_category_id',$this->age_category_id,true);
		$criteria->compare('create_user_id',$this->create_user_id,true);
		$criteria->compare('update_user_id',$this->update_user_id,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('image',$this->image,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Races the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    /**
     * @return bool
     */
    public function beforeSave()
    {
        $this->update_user_id = Yii::app()->getUser()->getId();

        if ($this->isNewRecord) {
            $this->create_user_id = $this->update_user_id;
        }

        return parent::beforeSave();
    }

    /**
     * @return array
     */
    public function behaviors()
    {
        $module = Yii::app()->getModule('Event');

        return [
            'CTimestampBehavior' => [
                'class'             => 'zii.behaviors.CTimestampBehavior',
                'setUpdateOnCreate' => true,
            ],
            'imageUpload' => [
                'class' => 'yupe\components\behaviors\ImageUploadBehavior',
                'attributeName' => 'image',
                'minSize' => $module->minSize,
                'maxSize' => $module->maxSize,
                'types' => $module->allowedExtensions,
                'uploadPath' => $module->uploadPath,
                'resizeOptions' => [
                    'width' => $module->width,
                    'height' => $module->height,
                    'quality' => [
                        'jpeg_quality' => 100,
                        'png_compression_level' => 3,
                    ],
                ]
            ],
        ];
    }

    public function getCountMembers(){
        if (!$this->id){
            return '';
        }
        return count($this->members);
    }
}
