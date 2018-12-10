<?php
use yupe\widgets\YPurifier;

/**
 * Форма регистрации
 *
 * @category YupeComponents
 * @package  yupe.modules.user.forms
 * @author   YupeTeam <team@yupe.ru>
 * @license  BSD http://ru.wikipedia.org/wiki/%D0%9B%D0%B8%D1%86%D0%B5%D0%BD%D0%B7%D0%B8%D1%8F_BSD
 * @version  0.5.3
 * @link     http://yupe.ru
 *
 **/
class RegistrationForm extends \yupe\models\YFormModel
//class RegistrationForm extends CFormModel
{

    public $first_name;
    public $last_name;
    public $middle_name;
    public $email;
    public $phone;
    public $birthday;
    public $gender;
    public $country;
    public $city;
    public $alternative_contact;
    public $t_shirt_size;
    public $club;
    public $team;
    public $info;
    public $avatar;

    public $password;
    public $cPassword;

    public $verifyCode;

    public $disableCaptcha = false;

    const MALE = 'male';
    const FEMALE = 'female';

    public function isCaptchaEnabled()
    {
        $module = Yii::app()->getModule('user');

        if (!$module->showCaptcha || !CCaptcha::checkRequirements() || $this->disableCaptcha) {
            return false;
        }

        return true;
    }

    public function rules()
    {
        $module = Yii::app()->getModule('user');

        return [
            ['first_name, last_name, middle_name, email, phone, city', 'filter', 'filter' => 'trim'],
//            ['nick_name, email', 'filter', 'filter' => 'trim'],
            ['first_name, last_name, middle_name, email, phone, city', 'filter', 'filter' => [new YPurifier(), 'purify']],
//            ['nick_name, email', 'filter', 'filter' => [new YPurifier(), 'purify']],
            ['first_name, last_name, gender, email, phone, city, birthday, alternative_contact, password, cPassword', 'required'],
//            ['nick_name, email, password, cPassword', 'required'],
            ['first_name, last_name, middle_name, email, city', 'length', 'max' => 50],
//            ['nick_name, email', 'length', 'max' => 50],
            ['password, cPassword', 'length', 'min' => $module->minPasswordLength],
//            [
//                'nick_name',
//                'match',
//                'pattern' => '/^[A-Za-z0-9_-]{2,50}$/',
//                'message' => Yii::t(
//                    'UserModule.user',
//                    'Bad field format for "{attribute}". You can use only letters and digits from 2 to 20 symbols'
//                )
//            ],
//            ['nick_name', 'checkNickName'],
            [
                'cPassword',
                'compare',
                'compareAttribute' => 'password',
                'message' => Yii::t('UserModule.user', 'Password is not coincide')
            ],
            ['email', 'email'],
            ['email', 'checkEmail'],
            [
                'verifyCode',
                'yupe\components\validators\YRequiredValidator',
                'allowEmpty' => !$this->isCaptchaEnabled(),
                'message' => Yii::t('UserModule.user', 'Check code incorrect')
            ],
//            ['verifyCode', 'captcha', 'allowEmpty' => !$this->isCaptchaEnabled()],
            ['verifyCode', 'emptyOnInvalid']
        ];
    }

    /**
     * Метод выполняется перед валидацией
     *
     * @return bool
     */
    public function beforeValidate()
    {
        $module = Yii::app()->getModule('user');

        if (empty($this->country)){
            $this->country = Yii::t('UserModule.user', 'Україна');
        }

        if ($module->generateNickName) {
            $this->nick_name = 'user' . time();
        }

        return parent::beforeValidate();
    }

    public function attributeLabels()
    {
        return [
            'first_name' => Yii::t('UserModule.user', 'Ім\'я'),
            'last_name' => Yii::t('UserModule.user', 'Прізвище'),
            'middle_name' => Yii::t('UserModule.user', 'По батькові'),
            'email' => Yii::t('UserModule.user', 'Email'),
            'phone' => Yii::t('UserModule.user', 'Телефон'),
            'birthday' => Yii::t('UserModule.user', 'Дата народженя'),
            'country' => Yii::t('UserModule.user', 'Країна'),
            'gender' => Yii::t('UserModule.user', 'Стать'),
            'city' => Yii::t('UserModule.user', 'Місто'),
            'alternative_contact' => Yii::t('UserModule.user', 'Контактна особа у випадку проблем (ім\'я або номер телефону)'),
            't_shirt_size' => Yii::t('UserModule.user', 'Розмір футболки'),
            'club' => Yii::t('UserModule.user', 'Клуб'),
            'team' => Yii::t('UserModule.user', 'Команда'),
            'info' => Yii::t('UserModule.user', 'Додаткова інформація'),
            'image' => Yii::t('UserModule.user', 'Фото'),
            'password' => Yii::t('UserModule.user', 'Password'),
            'cPassword' => Yii::t('UserModule.user', 'Password confirmation'),
            'verifyCode' => Yii::t('UserModule.user', 'Check code'),
        ];
    }

    public function checkNickName($attribute, $params)
    {
        $model = User::model()->find('nick_name = :nick_name', [':nick_name' => $this->$attribute]);

        if ($model) {
            $this->addError('nick_name', Yii::t('UserModule.user', 'User name already exists'));
        }
    }

    public function checkEmail($attribute, $params)
    {
        $model = User::model()->find('email = :email', [':email' => $this->$attribute]);

        if ($model) {
            $this->addError('email', Yii::t('UserModule.user', 'Email already busy'));
        }
    }

    public function emptyOnInvalid($attribute, $params)
    {
        if ($this->hasErrors()) {
            $this->verifyCode = null;
        }
    }

    public function getGenderList()
    {
        return [
            self::MALE => Yii::t('UserModule.user', 'male'),
            self::FEMALE  => Yii::t('UserModule.user', 'female'),
        ];
    }

    public function getTShirtSizeList()
    {
        return [
            'XS' => Yii::t('UserModule.user', 'XS'),
            'S' => Yii::t('UserModule.user', 'S'),
            'M' => Yii::t('UserModule.user', 'M'),
            'L' => Yii::t('UserModule.user', 'L'),
            'XL' => Yii::t('UserModule.user', 'XL'),
            'XXL' => Yii::t('UserModule.user', 'XXL'),
            'XXXL' => Yii::t('UserModule.user', 'XXXL'),
        ];
    }
}
