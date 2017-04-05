<?php

use yii\db\Migration;

/**
 * Handles the creation of table `news`.
 */
class m170331_024953_create_news_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('news', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('news');
    }
    
//    public function safeUp() {
//        parent::safeUp();
//    }
//    
//    public function safeDown() {
//        parent::safeDown();
//    }
}
