<?php

use yii\db\Migration;
use League\Csv\Reader;

class m170705_081346_create_tb_m_propinsi extends Migration
{
    const TABLE_NAME = 'tb_m_propinsi';
    public function up()
    {
  $this->createTable(self::TABLE_NAME, [
            
            'id_propinsi' => $this->primaryKey(),
            'nama_propinsi' => $this->string(50)->notNull(),
        
             

        ]);
  
      
        // path tempat file csv berada 
        $propinsi = Yii::getAlias('@app/migrations/propinsi.csv');
        // baca file csv menggunakan library league\csv
        $reader = Reader::createFromPath($propinsi);
        // insert data provinsi kedalam tabel provinsi
        foreach ($reader as $index => $row) {
           $this->insert('tb_m_propinsi', [
            'id_propinsi' => (int)$row[0],
            'nama_propinsi' => $row[1],
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
