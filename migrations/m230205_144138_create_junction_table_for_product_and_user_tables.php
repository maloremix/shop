<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%feedback}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%product}}`
 * - `{{%user}}`
 */
class m230205_144138_create_junction_table_for_product_and_user_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%feedback}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer(),
            'user_id' => $this->integer(),
            'feedback' => $this->text(),
        ]);

        // creates index for column `product_id`
        $this->createIndex(
            '{{%idx-feedback-product_id}}',
            '{{%feedback}}',
            'product_id'
        );

        // add foreign key for table `{{%product}}`
        $this->addForeignKey(
            '{{%fk-feedback-product_id}}',
            '{{%feedback}}',
            'product_id',
            '{{%product}}',
            'id',
            'CASCADE'
        );

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-feedback-user_id}}',
            '{{%feedback}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-feedback-user_id}}',
            '{{%feedback}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%product}}`
        $this->dropForeignKey(
            '{{%fk-feedback-product_id}}',
            '{{%feedback}}'
        );

        // drops index for column `product_id`
        $this->dropIndex(
            '{{%idx-feedback-product_id}}',
            '{{%feedback}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-feedback-user_id}}',
            '{{%feedback}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-feedback-user_id}}',
            '{{%feedback}}'
        );

        $this->dropTable('{{%feedback}}');
    }
}
