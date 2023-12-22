<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%item_details}}`.
 */
class m231221_072727_create_item_details_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%item_details}}', [
            'id' => $this->primaryKey(),
            'item_id' => $this->integer()->notNull(),
            'quantity' => $this->integer()->notNull()->defaultValue(0),
            'price' => $this->decimal(10, 2)->notNull(),
            'supplier_info' => $this->text()->notNull(),
            'status' => "ENUM('0', '1') NOT NULL DEFAULT '1'",
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%item_details}}');
    }
}
