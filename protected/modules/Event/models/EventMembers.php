<?php

/**
 * This is the model class for table "{{event_members}}".
 *
 * The followings are the available columns in table '{{event_members}}':
 * @property string $id
 * @property string $event_id
 * @property string $rece_id
 * @property string $first_name
 * @property string $last_name
 * @property string $midle_name
 * @property string $email
 * @property integer $phone
 * @property string $b_date
 * @property integer $sex
 * @property string $city
 * @property string $alternative_contact
 * @property integer $status
 * @property string $promo_code
 * @property string $create_user_id
 * @property string $update_user_id
 * @property string $create_time
 * @property string $update_time
 * @property string $image
 */
class EventMembers extends yupe\models\YModel
//class EventMembers extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{event_members}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('event_id, rece_id, first_name, last_name, email, phone, b_date, sex, city, create_user_id, update_user_id, create_time, update_time', 'required'),
			array('phone, sex, status', 'numerical', 'integerOnly'=>true),
			array('event_id, rece_id, create_user_id, update_user_id', 'length', 'max'=>11),
			array('first_name, last_name, midle_name, email, alternative_contact, promo_code', 'length', 'max'=>255),
			array('city', 'length', 'max'=>100),
			array('image', 'length', 'max'=>300),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, event_id, rece_id, first_name, last_name, midle_name, email, phone, b_date, sex, city, alternative_contact, status, promo_code, create_user_id, update_user_id, create_time, update_time, image', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'event_id' => 'Event',
			'rece_id' => 'Rece',
			'first_name' => 'Имя',
			'last_name' => 'Фамилия',
			'midle_name' => 'Отчество',
			'email' => 'Электронная почта',
			'phone' => 'Номер телефона',
			'b_date' => 'Дата рождения',
			'sex' => 'Пол',
			'city' => 'Город',
			'alternative_contact' => 'Контакт в случае проблем',
			'status' => 'Статус',
			'promo_code' => 'Промо код',
			'create_user_id' => 'Create User',
			'update_user_id' => 'Update User',
			'create_time' => 'Create Time',
			'update_time' => 'Update Time',
			'image' => 'Изображение',
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
		$criteria->compare('rece_id',$this->rece_id,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('midle_name',$this->midle_name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('phone',$this->phone);
		$criteria->compare('b_date',$this->b_date,true);
		$criteria->compare('sex',$this->sex);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('alternative_contact',$this->alternative_contact,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('promo_code',$this->promo_code,true);
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
	 * @return EventMembers the static model class
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
}
