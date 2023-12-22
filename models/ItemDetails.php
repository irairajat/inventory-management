<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "item_details".
 *
 * @property int $id
 * @property int $item_id
 * @property int $quantity
 * @property float $price
 * @property string $supplier_info
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 */
class ItemDetails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'item_details';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['item_id', 'price', 'supplier_info'], 'required'],
            [['item_id', 'quantity'], 'integer'],
            [['price'], 'number'],
            [['supplier_info', 'status'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'item_id' => 'Item ID',
            'quantity' => 'Quantity',
            'price' => 'Price',
            'supplier_info' => 'Supplier Info',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
