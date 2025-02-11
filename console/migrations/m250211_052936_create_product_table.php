<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 */
class m250211_052936_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'product_name' => $this->string(100)->notNull()->unique(),
            'product_image_url' => $this->string()->notNull(),
            'product_description' => $this->text(300)->notNull(),
            'product_price' => $this->integer()->notNull(),
            'product_quantity' => $this->integer()->notNull(),
            'product_category_id' => $this->integer()->notNull()

        ]);

        // add index for Foreign Key to improve performance
        $this->createIndex(
            'idx-product-category_id',
            '{{%product}}',
            'product_category_id'
        );

        //adding foreign key constraint 
        $this->addForeignKey(
            'fk-product-category_id',
            '{{%product}}',
            'product_category_id',
            '{{%product_category}}',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-product-category_id',  '{{%product}}');
        $this->dropIndex(
            'idx-product-category_id',
            '{{%product}}'
        );
        $this->dropTable('{{%product}}');
    }
}
