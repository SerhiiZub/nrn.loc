<?php

/**
 * This is the model class for table "{{event_slider}}".
 *
 * The followings are the available columns in table '{{event_slider}}':
 * @property string $id
 * @property string $image
 * @property string $alts
 * @property string $url
 * @property string $is_enable
 */
class EventSlider extends yupe\models\YModel
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{event_slider}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('image, alts, url, is_enable', 'required'),
			array('image', 'length', 'max'=>50),
			array('alts', 'length', 'max'=>100),
			array('url, is_enable', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, image, alts, url, is_enable', 'safe', 'on'=>'search'),
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
			'image' => 'Зображення слайду',
			'alts' => 'Підпис',
			'url' => 'Посилання',
			'is_enable' => 'Статус',
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
		$criteria->compare('image',$this->image,true);
		$criteria->compare('alts',$this->alts,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('is_enable',$this->is_enable,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EventSlider the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public static function getSlides()
    {
        $result['images'] = [];
        $result['alts'] = [];
        $result['urls'] = [];
        $data = EventSlider::model()->findAll();
        if (empty($data)){
            return $result;
        }

        foreach ($data as $item){
            array_push($result['images'], $item->image);
            array_push($result['alts'], $item->alts);
            array_push($result['urls'], $item->url);
        }
        return $result;
    }
}
