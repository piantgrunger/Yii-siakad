<?php

use yii\db\Migration;
use League\Csv\Reader;

class m170705_082616_create_tb_m_kota extends Migration
{
    const TABLE_NAME = 'tb_m_kota';
    public function up()
    {
  $this->createTable(self::TABLE_NAME, [
            
            'id_kota' => $this->primaryKey(),
       'id_propinsi' => $this->integer()->notNull(),
            'nama_kota' => $this->string(50)->notNull(),
        
             

        ]);
    // creates index for column `id_propinsi`
        $this->createIndex(
        'idx-kota-id_propinsi',
        'tb_m_kota',
        'id_propinsi'
        );
        
        // add foreign key for table `provinsi`
        $this->addForeignKey(
        'fk-kota-id_propinsi',
        'tb_m_kota',
        'id_propinsi',
        'tb_m_propinsi',
        'id_propinsi',
        'CASCADE'
        );
      
        // path tempat file csv berada 
        $kota = Yii::getAlias('@app/migrations/kota.csv');
        // baca file csv menggunakan library league\csv
        $reader = Reader::createFromPath($kota);
        // insert data provinsi kedalam tabel provinsi
        foreach ($reader as $index => $row) {
           $this->insert('tb_m_kota', [
            'id_kota' => (int)$row[0],
            'id_propinsi' => (int)$row[1],
                 'nama_kota' => $row[2],
        ]);
        }
    }
    

    public function down()
    {
       $this->dropTable(self::TABLE_NAME);
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
