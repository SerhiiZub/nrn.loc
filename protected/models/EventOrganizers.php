<?php

/**
 * This is the model class for table "{{event_organizers}}".
 *
 * The followings are the available columns in table '{{event_organizers}}':
 * @property string $id
 * @property string $name
 * @property string $description
 * @property string $city
 * @property string $address
 * @property integer $phone
 * @property string $email
 * @property string $image
 * @property string $public_key
 * @property string $private_key
 * @property string $create_user_id
 * @property string $update_user_id
 * @property string $create_time
 * @property string $update_time
 */
//class EventOrganizers extends CActiveRecord
class EventOrganizers extends yupe\models\YModel
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{event_organizers}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('phone', 'numerical', 'integerOnly'=>true),
			array('name, city', 'length', 'max'=>100),
			array('address, email', 'length', 'max'=>255),
			array('image', 'length', 'max'=>300),
			array('public_key', 'length', 'max'=>20),
			array('private_key', 'length', 'max'=>50),
			array('create_user_id, update_user_id', 'length', 'max'=>11),
			array('description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, description, city, address, phone, email, image, public_key, private_key, create_user_id, update_user_id, create_time, update_time', 'safe', 'on'=>'search'),
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
			'name' => 'назва',
			'description' => 'опис',
			'city' => 'місто',
			'address' => 'адреса',
			'phone' => 'телефон',
			'email' => 'електронна пошта',
			'image' => 'зображення',
			'public_key' => 'платіжні реквізити (публічний ключ)',
			'private_key' => 'платіжні реквізити (приватний ключ)',
			'create_user_id' => 'Create User',
			'update_user_id' => 'Update User',
			'create_time' => 'Create Time',
			'update_time' => 'Update Time',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('phone',$this->phone);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('public_key',$this->public_key,true);
		$criteria->compare('private_key',$this->private_key,true);
		$criteria->compare('create_user_id',$this->create_user_id,true);
		$criteria->compare('update_user_id',$this->update_user_id,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EventOrganizers the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    /**
     * @return array
     */
    public function behaviors()
    {
        $module = Yii::app()->getModule('Event');

        return [
            /*            'imageUpload'        => [
                            'class'         => 'yupe\components\behaviors\ImageUploadBehavior',
                            'attributeName' => 'icon',
                            'minSize'       => $module->minSize,
                            'maxSize'       => $module->maxSize,
                            'types'         => $module->allowedExtensions,
                            'uploadPath'    => $module->uploadPath,
                            'defaultImage'  => '/public'.Yii::app()->getTheme()->getAssetsUrl() . '/dist/img/avatar.png',
                        ],*/
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

    public function __get($name)
    {

        if(isset($this->$name) && $name === 'description'){
            $html = htmlspecialchars_decode(parent::__get($name));
            return $html;
        }


        return parent::__get($name);
    }

    public function beforeValidate()
    {
        $this->description = htmlspecialchars($this->description);
        return parent::beforeValidate();
    }

    public static function getOrganizers()
    {
        $organizers = self::model()->findAll();
        $arr[0] = Yii::t('EventModule.Event','не обрано');
        if (!empty($organizers)){
            foreach ($organizers as $organizer){
                $arr[$organizer->id] = $organizer->name;
            }
        }
        return $arr;
    }
}
