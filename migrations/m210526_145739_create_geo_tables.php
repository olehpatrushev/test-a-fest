<?php

use yii\db\Migration;

/**
 * Class m210526_145739_create_geo_tables
 */
class m210526_145739_create_geo_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('geo_item', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'type' => "ENUM('country', 'state', 'locality') NOT NULL",
            'parent_id' => $this->integer()
        ]);

        $this->addForeignKey(
            'geo_item_parent_id',
            'geo_item',
            'parent_id',
            'geo_item',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->batchInsert('geo_item', ['id', 'name', 'type', 'parent_id'],
            [
                [1, 'Украина', 'country', null],
                [2, 'Киевская область', 'state', 1],
                [3, 'Киев', 'locality', 2],
                [4, 'Житомир', 'locality', 2],
                [5, 'Борисполь', 'locality', 2],
                [6, 'Донецкая область', 'state', 1],
                [7, 'Донецк', 'locality', 6],
                [8, 'Мариуполь', 'locality', 6],
                [9, 'Макеевка', 'locality', 6],
                [10, 'Россия', 'country', null],
                [11, 'Амурская область', 'state', 10],
                [12, 'Благовещенск', 'locality', 11],
                [13, 'Белогорск', 'locality', 11],
                [14, 'Тында', 'locality', 11],
                [15, 'Ленинградская область', 'state', 10],
                [16, 'Санкт Петербург', 'locality', 15],
                [17, 'Гатчина', 'locality', 15],
                [18, 'Луга', 'locality', 15],
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210526_145739_create_geo_tables cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210526_145739_create_geo_tables cannot be reverted.\n";

        return false;
    }
    */
}
