<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "items".
 *
 * @property int $id
 * @property string $name
 * @property int $category_id
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 */
class Items extends \yii\db\ActiveRecord
{
    public $category_name;
    public $price;
    public $quantity;
    public $supplier_info;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'items';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'category_id'], 'required'],
            [['status'], 'string'],
            [['created_at', 'updated_at','category_name'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Product Id',
            'name' => 'Product Name',
            'category_id' => 'Category',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
