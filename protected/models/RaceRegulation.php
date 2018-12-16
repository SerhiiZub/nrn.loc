<?php

/**
 * This is the model class for table "{{race_regulation}}".
 *
 * The followings are the available columns in table '{{race_regulation}}':
 * @property string $id
 * @property string $race_id
 * @property string $title
 * @property string $description
 * @property string $file
 * @property string $create_user_id
 * @property string $update_user_id
 * @property string $create_time
 * @property string $update_time
 */
class RaceRegulation extends yupe\models\YModel
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{race_regulation}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, description', 'required'),
			array('race_id, create_user_id, update_user_id', 'length', 'max'=>11),
			array('title', 'length', 'max'=>255),
			array('file', 'length', 'max'=>100),
			array('create_time, update_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, race_id, title, description, file, create_user_id, update_user_id, create_time, update_time', 'safe', 'on'=>'search'),
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
			'race_id' => 'Race',
			'title' => 'заголовок',
			'description' => 'детальний опис',
			'file' => 'файл',
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
		$criteria->compare('race_id',$this->race_id,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('file',$this->file,true);
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
	 * @return RaceRegulation the static model class
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
//            'imageUpload' => [
//                'class' => 'yupe\components\behaviors\ImageUploadBehavior',
//                'attributeName' => 'file',
//                'minSize' => $module->minSize,
//                'maxSize' => $module->maxSize,
//                'types' => $module->allowedExtensions,
//                'uploadPath' => $module->uploadPath,
//                'resizeOptions' => [
//                    'width' => $module->width,
//                    'height' => $module->height,
//                    'quality' => [
//                        'jpeg_quality' => 100,
//                        'png_compression_level' => 3,
//                    ],
//                ]
//            ],
            'file-upload' => [
                'class' => 'yupe\components\behaviors\FileUploadBehavior',
                'attributeName' => 'file',
                'uploadPath' => $module->uploadPath,
                'types'         => $module->allowedExtensions,
            ],
        ];
    }
}
