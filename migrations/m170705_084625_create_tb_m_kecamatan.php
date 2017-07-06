<?php

use yii\db\Migration;
use League\Csv\Reader;

class m170705_084625_create_tb_m_kecamatan extends Migration
{
        const TABLE_NAME = 'tb_m_kecamatan';
    public function up()
    {
  $this->createTable(self::TABLE_NAME, [
            
            'id_kecamatan' => $this->primaryKey(),
       'id_kota' => $this->integer()->notNull(),
            'nama_kecamatan' => $this->string(50)->notNull(),
        
             

        ]);
    // creates index for column `id_kota`
        $this->createIndex(
        'idx-kecamatan-id_kota',
        'tb_m_kecamatan',
        'id_kota'
        );
        
        // add foreign key for table `provinsi`
        $this->addForeignKey(
        'fk-kecamatan-id_kota',
        'tb_m_kecamatan',
        'id_kota',
        'tb_m_kota',
        'id_kota',
        'CASCADE'
        );
      
        // path tempat file csv berada 
        $kecamatan = Yii::getAlias('@app/migrations/kecamatan.csv');
        // baca file csv menggunakan library league\csv
        $reader = Reader::createFromPath($kecamatan);
        // insert data provinsi kedalam tabel provinsi
        foreach ($reader as $index => $row) {
           $this->insert('tb_m_kecamatan', [
            'id_kecamatan' => (int)$row[0],
            'id_kota' => (int)$row[1],
                 'nama_kecamatan' => $row[2],
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
