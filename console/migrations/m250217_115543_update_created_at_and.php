<?php

use yii\db\Migration;

/**
 * Class m250217_115543_update_created_at_and
 */
class m250217_115543_update_created_at_and extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('{{%profile}}', 'created_at', "DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP");
        $this->alterColumn('{{%profile}}', 'updated_at', "DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        // Revert back to INTEGER type if needed
        $this->alterColumn('{{%profile}}', 'created_at', $this->integer()->notNull());
        $this->alterColumn('{{%profile}}', 'updated_at', $this->integer()->notNull());
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250217_115543_update_created_at_and cannot be reverted.\n";

        return false;
    }
    */
}
