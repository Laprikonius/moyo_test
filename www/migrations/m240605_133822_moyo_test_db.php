<?php

use yii\db\Migration;

/**
 * Class m240605_133822_moyo_test_db
 */
class m240605_133822_moyo_test_db extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240605_133822_moyo_test_db cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240605_133822_moyo_test_db cannot be reverted.\n";

        return false;
    }
    */
}
