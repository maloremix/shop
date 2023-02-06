<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%favorite}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%product}}`
 */
class m230206_185730_create_junction_table_for_user_and_product_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%favorite}}', [
            'user_id' => $this->integer(),
            'product_id' => $this->integer(),
            'PRIMARY KEY(user_id, product_id)',
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-favorite-user_id}}',
            '{{%favorite}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-favorite-user_id}}',
            '{{%favorite}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `product_id`
        $this->createIndex(
            '{{%idx-favorite-product_id}}',
            '{{%favorite}}',
            'product_id'
        );

        // add foreign key for table `{{%product}}`
        $this->addForeignKey(
            '{{%fk-favorite-product_id}}',
            '{{%favorite}}',
            'product_id',
            '{{%product}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-favorite-user_id}}',
            '{{%favorite}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-favorite-user_id}}',
            '{{%favorite}}'
        );

        // drops foreign key for table `{{%product}}`
        $this->dropForeignKey(
            '{{%fk-favorite-product_id}}',
            '{{%favorite}}'
        );

        // drops index for column `product_id`
        $this->dropIndex(
            '{{%idx-favorite-product_id}}',
            '{{%favorite}}'
        );

        $this->dropTable('{{%favorite}}');
    }
}
