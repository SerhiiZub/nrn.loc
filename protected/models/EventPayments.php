<?php

/**
 * This is the model class for table "{{event_payments}}".
 *
 * The followings are the available columns in table '{{event_payments}}':
 * @property string $id
 * @property string $payment_id
 * @property string $status
 * @property string $paytype
 * @property string $public_key
 * @property string $order_id
 * @property string $liqpay_order_id
 * @property string $description
 * @property string $sender_phone
 * @property string $sender_card_bank
 * @property string $sender_card_type
 * @property string $ip
 * @property string $info
 * @property string $amount
 * @property string $currency
 * @property string $transaction_id
 * @property string $full_data
 * @property string $create_time
 * @property string $update_time
 */
class EventPayments extends yupe\models\YModel
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{event_payments}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('payment_id', 'length', 'max'=>10),
			array('status, paytype, public_key, order_id, liqpay_order_id, sender_card_bank, sender_card_type, ip, info, amount, currency, transaction_id', 'length', 'max'=>50),
			array('description', 'length', 'max'=>255),
			array('sender_phone', 'length', 'max'=>12),
			array('full_data', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, payment_id, status, paytype, public_key, order_id, liqpay_order_id, description, sender_phone, sender_card_bank, sender_card_type, ip, info, amount, currency, transaction_id, full_data, create_time, update_time', 'safe', 'on'=>'search'),
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
			'payment_id' => 'Payment',
			'status' => 'Status',
			'paytype' => 'Paytype',
			'public_key' => 'Public Key',
			'order_id' => 'Order',
			'liqpay_order_id' => 'Liqpay Order',
			'description' => 'Description',
			'sender_phone' => 'Sender Phone',
			'sender_card_bank' => 'Sender Card Bank',
			'sender_card_type' => 'Sender Card Type',
			'ip' => 'Ip',
			'info' => 'Info',
			'amount' => 'Amount',
			'currency' => 'Currency',
			'transaction_id' => 'Transaction',
			'full_data' => 'Full Data',
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
		$criteria->compare('payment_id',$this->payment_id,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('paytype',$this->paytype,true);
		$criteria->compare('public_key',$this->public_key,true);
		$criteria->compare('order_id',$this->order_id,true);
		$criteria->compare('liqpay_order_id',$this->liqpay_order_id,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('sender_phone',$this->sender_phone,true);
		$criteria->compare('sender_card_bank',$this->sender_card_bank,true);
		$criteria->compare('sender_card_type',$this->sender_card_type,true);
		$criteria->compare('ip',$this->ip,true);
		$criteria->compare('info',$this->info,true);
		$criteria->compare('amount',$this->amount,true);
		$criteria->compare('currency',$this->currency,true);
		$criteria->compare('transaction_id',$this->transaction_id,true);
		$criteria->compare('full_data',$this->full_data,true);
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
	 * @return EventPayments the static model class
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
            'CTimestampBehavior' => [
                'class' => 'zii.behaviors.CTimestampBehavior',
                'setUpdateOnCreate' => true,
            ],
        ];
    }
}
