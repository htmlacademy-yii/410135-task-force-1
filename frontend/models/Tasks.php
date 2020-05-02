<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tasks".
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property int|null $category_id
 * @property string|null $date_add
 * @property string|null $date_finish
 * @property int|null $city_id
 * @property int|null $status_id
 * @property int|null $customer_id
 * @property int|null $implementer_id
 * @property string|null $file_link
 * @property int|null $cost
 */
class Tasks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tasks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['description'], 'string'],
            [['category_id', 'city_id', 'status_id', 'customer_id', 'implementer_id', 'cost'], 'integer'],
            [['date_add', 'date_finish'], 'safe'],
            [['title', 'file_link'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'category_id' => 'Category ID',
            'date_add' => 'Date Add',
            'date_finish' => 'Date Finish',
            'city_id' => 'City ID',
            'status_id' => 'Status ID',
            'customer_id' => 'Customer ID',
            'implementer_id' => 'Implementer ID',
            'file_link' => 'File Link',
            'cost' => 'Cost',
        ];
    }
}
