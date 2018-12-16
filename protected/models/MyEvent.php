<?php

/**
 * This is the model class for table "{{event}}".
 *
 * The followings are the available columns in table '{{event}}':
 * @property integer $id
 * @property integer $create_user_id
 * @property integer $update_user_id
 * @property string $create_time
 * @property string $update_time
 * @property string $image
 * @property string $name
 * @property string $event_organizer
 * @property string $description
 * @property string $icon
 * @property string $slug
 * @property integer $status
 * @property string $city
 * @property string $address
 * @property string $sellerId
 * @property string $dateTimeStart
 * @property string $dateTimeEndRegistration
 */
class MyEvent extends yupe\models\YModel
//class Event extends CActiveRecord
{
    /**
     *
     */
    const STATUS_BLOCKED = 0;

    /**
     *
     */
    const STATUS_ACTIVE = 1;

    /**
     *
     */
    const STATUS_DELETED = 2;

    /**
     *
     */
    const STATUS_ENDED = 3;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{event}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, city, dateTimeStart', 'required'),
/*            [
                'status, create_user_id, update_user_id, create_time, update_time',
                'numerical',
                'integerOnly' => true
            ],*/
//            array('image', 'file', 'types'=>'jpg, gif, png', 'safe' => false),
			array('create_user_id, update_user_id, status, event_organizer', 'numerical', 'integerOnly'=>true),
			array('image', 'length', 'max'=>300),
			array('sellerId', 'length', 'max'=>36),
			array('name, icon', 'length', 'max'=>250),
			array('slug', 'length', 'max'=>150),
			array('description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array(
			    'id, create_user_id, update_user_id, create_time, update_time, image, name, description, icon, slug, status, city, address, sellerId, dateTimeStart, dateTimeEndRegistration, event_organizer',
                'safe',
                'on'=>'search'
            ),
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
		    'races' => [self::HAS_MANY, 'Races', 'event_id'],
		    'organizer' => [self::BELONGS_TO, 'EventOrganizers', ['event_organizer' => 'id']],
//		    'organizer' => [self::HAS_ONE, 'EventOrganizers', ['event_organizer' => 'id']],
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'create_user_id' => 'Create User',
			'update_user_id' => 'Update User',
			'create_time' => 'Create Time',
			'update_time' => 'Update Time',
			'image' => 'Image',
			'name' => 'Name',
			'event_organizer' => 'Організатор змагань',
			'description' => 'Description',
			'icon' => 'Icon',
			'slug' => 'Slug',
			'status' => 'Status',
			'city' => 'City',
			'address' => 'Address',
			'sellerId' => 'Id seller',
			'dateTimeStart' => 'Start event date',
			'dateTimeEndRegistration' => 'End registration date',
		);
	}

    /**
     * @return array
     */
    public function scopes()
    {
        return [
            'active' => [
                'condition' => 't.status = :status',
                'params'    => [':status' => self::STATUS_ACTIVE],
            ],
            'blocked'    => [
                'condition' => 't.status = :status',
                'params'    => [':status' => self::STATUS_BLOCKED],
            ],
        ];
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

		$criteria->compare('id',$this->id);
		$criteria->compare('create_user_id',$this->create_user_id);
		$criteria->compare('update_user_id',$this->update_user_id);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('icon',$this->icon,true);
//		$criteria->compare('slug',$this->slug,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('event_organizer',$this->event_organizer);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Event the static model class
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
//        $this->update_time = (new DateTime('now'))->format(DateTime::ATOM);

        if ($this->isNewRecord) {
            $this->create_user_id = $this->update_user_id;
//            $this->create_time = (new DateTime('now'))->format(DateTime::ATOM);
        }

        return parent::beforeSave();
    }

    /**
     * @return array
     */
    public function getStatusList()
    {
        return [
            self::STATUS_BLOCKED => Yii::t('EventModule.event', 'Blocked'),
            self::STATUS_ACTIVE  => Yii::t('EventModule.event', 'Active'),
            self::STATUS_DELETED => Yii::t('EventModule.event', 'Removed'),
            self::STATUS_ENDED => Yii::t('EventModule.event', 'Ended'),
        ];
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        $data = $this->getStatusList();

        return isset($data[$this->status]) ? $data[$this->status] : Yii::t('EventModule.event', '*unknown*');
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
     * @return array customized attribute descriptions (name=>description)
     */
    public function attributeDescriptions()
    {
        return [
            'id'          => Yii::t('EventModule.event', 'Post id.'),
            'name'        => Yii::t(
                'EventModule.event',
                'Please enter a title of the blog. For example: <span class="label label-default">My travel notes</span>.'
            ),
            'description' => Yii::t(
                'EventModule.event',
                'Please enter a short description of the blog. For example:<br /><br /> <pre>Notes on my travel there and back again. Illustrated.</pre>'
            ),
            'icon'        => Yii::t('EventModule.event', 'Please choose an icon for the blog.'),
            'slug'        => Yii::t(
                'EventModule.event',
                'Please enter an URL-friendly name for the blog.<br /><br /> For example: <pre>http://site.ru/blogs/<span class="label label-default">travel-notes</span>/</pre> If you don\'t know how to fill this field you can leave it empty.'
            ),
            'status'      => Yii::t(
                'EventModule.event',
                'Please choose a status of the blog:<br /><br /><span class="label label-success">active</span> &ndash; The blog will be visible and it will be possible to create new records<br /><br /><span class="label label-warning">blocked</span> &ndash; The blog will be visible but it would not be possible to create new records<br /><br /><span class="label label-danger">removed</span> &ndash; The blog will be invisible'
            ),
        ];
    }

    /**
     * @return bool
     */
    public function beforeValidate()
    {
        if (!$this->slug) {
            $this->slug = yupe\helpers\YText::translit($this->name);
        }

        return parent::beforeValidate();
    }

//    public function _getDescription()
//    {
//        return htmlspecialchars_decode($this->description);
//    }
//
    public function __get($name)
    {

        if(isset($this->$name) && $name === 'description'){
            $html = htmlspecialchars_decode(parent::__get($name));
            return $html;
        }


        return parent::__get($name);
    }

    public function getHtmlDescription()
    {
        return htmlspecialchars_decode($this->description);
    }
}
