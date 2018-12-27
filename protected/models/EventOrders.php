<?php

/**
 * This is the model class for table "{{event_orders}}".
 *
 * The followings are the available columns in table '{{event_orders}}':
 * @property string $id
 * @property string $event_id
 * @property string $race_id
 * @property string $organizer_id
 * @property string $event_member_id
 * @property string $user_id
 * @property string $amount
 * @property string $promo_code
 * @property string $payment_status
 * @property string $payment_id
 * @property string $create_user_id
 * @property string $update_user_id
 * @property string $create_time
 * @property string $update_time
 */
class EventOrders extends yupe\models\YModel
{

    const NOT_PAYED = 0;
    const PAYMENT_SUCCESS = 1;
    const PAYMENT_FREE = 2;
    const PAYMENT_WAIT = 3;
    const PAYMENT_ERROR = 4;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{event_orders}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('event_id, race_id, organizer_id, event_member_id, user_id, amount, payment_status', 'required'),
			array('event_id, race_id, organizer_id, event_member_id, user_id, amount, promo_code, payment_status, payment_id, create_user_id, update_user_id', 'length', 'max'=>11),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, event_id, race_id, organizer_id, event_member_id, user_id, amount, promo_code, payment_status, payment_id, create_user_id, update_user_id, create_time, update_time', 'safe', 'on'=>'search'),
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
			'event_id' => 'Спортивний захід',
			'race_id' => 'Race',
			'organizer_id' => 'Організатор',
			'event_member_id' => 'Учасник забігу',
			'user_id' => 'User',
			'amount' => 'Сумма',
			'promo_code' => 'Promo Code',
			'payment_status' => 'Статус оплати',
			'payment_id' => 'Payment',
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
		$criteria->compare('event_id',$this->event_id,true);
		$criteria->compare('race_id',$this->race_id,true);
		$criteria->compare('organizer_id',$this->organizer_id,true);
		$criteria->compare('event_member_id',$this->event_member_id,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('amount',$this->amount,true);
		$criteria->compare('promo_code',$this->promo_code,true);
		$criteria->compare('payment_status',$this->payment_status,true);
		$criteria->compare('payment_id',$this->payment_id,true);
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
	 * @return EventOrders the static model class
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
        $user_id = Yii::app()->getUser()->getId();
        if (!empty($user_id)) {
            $this->update_user_id = $user_id;
        } else {
            $this->update_user_id = 0;
        }

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
                'class' => 'zii.behaviors.CTimestampBehavior',
                'setUpdateOnCreate' => true,
            ],
        ];
    }
}
