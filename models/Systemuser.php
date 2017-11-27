<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "systemuser".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $phone_number
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $authKey
 * @property string $user_level
 */
class Systemuser extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{   
    public static function findIdentity($id){
		return static::findOne($id);
	}

	public static function findIdentityByAccessToken($token, $type = null){
		throw new NotSupportedException();//I don't implement this method because I don't have any access token column in my database
	}

	public function getId(){
		return $this->id;
	}

	public function getAuthKey(){
		return $this->authKey;//Here I return a value of my authKey column
	}

	public function validateAuthKey($authKey){
		return $this->authKey === $authKey;
	}
	public static function findByUsername($username){
		return self::findOne(['username'=>$username]);
	}

	public function validatePassword($password){
		return $this->password === $password;
	}
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'systemuser';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'phone_number', 'username', 'email', 'password', 'authKey'], 'required'],
            [['user_level'], 'string'],
            [['first_name', 'last_name', 'username', 'password', 'authKey'], 'string', 'max' => 250],
            [['phone_number'], 'string', 'max' => 30],
            [['email'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'phone_number' => 'Phone Number',
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
            'authKey' => 'Auth Key',
            'user_level' => 'User Level',
        ];
    }
    
      public static function isUserAmin($userName){
       if(static::findOne(['username' => $userName, 'user_level'=>'Admin' ])){
           return true;
       } else {
           return false;
       }
   }
   public static function isUserSuperAmin($userName){
       if(static::findOne(['username' => $userName, 'user_level'=>'Super Admin' ])){
           return true;
       } else {
           return false;
       }
   }
}
