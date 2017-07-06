<?php

use yii\db\Migration;
use League\Csv\Reader;

class m170705_085255_create_tb_m_kelurahan extends Migration
{
     const TABLE_NAME = 'tb_m_kelurahan';
    public function up()
    {
  $this->createTable(self::TABLE_NAME, [
            
            'id_kelurahan' => $this->bigInteger()->notNull(),
       'id_kecamatan' => $this->integer()->notNull(),
            'nama_kelurahan' => $this->string(50)->notNull(),
        
             

        ]);
        $this->addPrimaryKey('pk_tb_kelurahan', $this::TABLE_NAME ,'id_kelurahan');
    // creates index for column `id_kecamatan`
        $this->createIndex(
        'idx-kelurahan-id_kecamatan',
        'tb_m_kelurahan',
        'id_kecamatan'
        );
        
        // add foreign key for table `provinsi`
        $this->addForeignKey(
        'fk-kelurahan-id_kecamatan',
        'tb_m_kelurahan',
        'id_kecamatan',
        'tb_m_kecamatan',
        'id_kecamatan',
        'CASCADE'
        );
      
        // path tempat file csv berada 
        $kelurahan = Yii::getAlias('@app/migrations/kelurahan.csv');
        // baca file csv menggunakan library league\csv
        $reader = Reader::createFromPath($kelurahan);
        // insert data provinsi kedalam tabel provinsi
        //cek max_allowed_packet di my.ini
        $Rows = array();
        foreach ($reader as $index => $row) {
            array_push($Rows, [ 
            $row[0],
             (int)$row[1],
                  $row[2],
              ]      
        );
            
        }
         $this->batchInsert($this::TABLE_NAME,['id_kelurahan','id_kecamatan','nama_kelurahan'] , $Rows);
       
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
