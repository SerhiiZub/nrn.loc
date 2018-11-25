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
 * @property string $description
 * @property string $icon
 * @property string $slug
 * @property integer $status
 */
class Event extends yupe\models\YModel
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
			array('name', 'required'),
/*            [
                'status, create_user_id, update_user_id, create_time, update_time',
                'numerical',
                'integerOnly' => true
            ],*/
			array('create_user_id, update_user_id, status', 'numerical', 'integerOnly'=>true),
			array('image', 'length', 'max'=>300),
			array('name, icon', 'length', 'max'=>250),
			array('slug', 'length', 'max'=>150),
			array('description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, create_user_id, update_user_id, create_time, update_time, image, name, description, icon, slug, status', 'safe', 'on'=>'search'),
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
			'create_user_id' => 'Create User',
			'update_user_id' => 'Update User',
			'create_time' => 'Create Time',
			'update_time' => 'Update Time',
			'image' => 'Image',
			'name' => 'Name',
			'description' => 'Description',
			'icon' => 'Icon',
			'slug' => 'Slug',
			'status' => 'Status',
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
		$criteria->compare('slug',$this->slug,true);
		$criteria->compare('status',$this->status);

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
            'imageUpload'        => [
                'class'         => 'yupe\components\behaviors\ImageUploadBehavior',
                'attributeName' => 'icon',
                'minSize'       => $module->minSize,
                'maxSize'       => $module->maxSize,
                'types'         => $module->allowedExtensions,
                'uploadPath'    => $module->uploadPath,
                'defaultImage'  => Yii::app()->getTheme()->getAssetsUrl() . '/images/blog-default.jpg',
            ],
            'CTimestampBehavior' => [
                'class'             => 'zii.behaviors.CTimestampBehavior',
                'setUpdateOnCreate' => true,
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
}
