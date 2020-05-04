<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $phone
 * @property string|null $skype
 * @property string|null $other_messanger
 * @property string|null $date_add
 * @property int|null $city_id
 * @property int|null $popular
 * @property int|null $role
 *
 * @property UserRole $role0
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'password'], 'required'],
            [['date_add'], 'safe'],
            [['city_id', 'popular', 'role'], 'integer'],
            [['name', 'email', 'password', 'phone', 'skype', 'other_messanger'], 'string', 'max' => 45],
            [['email'], 'unique'],
            [['role'], 'exist', 'skipOnError' => true, 'targetClass' => UserRole::className(), 'targetAttribute' => ['role' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
            'phone' => 'Phone',
            'skype' => 'Skype',
            'other_messanger' => 'Other Messanger',
            'date_add' => 'Date Add',
            'city_id' => 'City ID',
            'popular' => 'Popular',
            'role' => 'Role',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRole0()
    {
        return $this->hasOne(UserRole::className(), ['id' => 'role']);
    }
    public function getCity()
    {
        return $this->hasOne(Cities::className(), ['id' => 'city_id']);
    }
}
