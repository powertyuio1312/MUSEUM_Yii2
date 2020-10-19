<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%otzyvy}}`.
 */
class m200517_124142_create_otzyvy_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%otzyvy}}', [
            'id' => $this->primaryKey(),
            'text'=>$this->string(),
            'user_id'=>$this->integer(),
            'article_id'=>$this->integer(),
            'status'=>$this->integer(),
        ]);
        $this->createIndex(
            'idx-posts-user_id',
            'otzyvy',
            'user_id'
        );
        $this->addForeignKey(
            'fk-posts-user_id',
            'otzyvy',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );
        $this->createIndex(
            'idx-article_id',
            'otzyvy',
            'article_id'
        );
        $this->addForeignKey(
            'fk-article_id',
            'otzyvy',
            'article_id',
            'article',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%otzyvy}}');
    }
}
