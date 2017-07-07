<?php

use yii\db\Migration;

class m170707_102050_create_tb_m_biaya extends Migration
{
     const TABLE_NAME = 'tb_m_biaya';
    public function up()
    {
   $this->createTable(self::TABLE_NAME, [
            //data biaya
            'id_biaya' => $this->primaryKey(),
            'kode_biaya' => $this->string(50)->notNull()->unique(),
            'nama_biaya' => $this->string(100)->notNull(),
            'total_biaya' => $this->money(19,2)->notNull(),
       
            'jenis_biaya'=>"Enum('Wajib','Sukarela') NOT NULL "  ,
    
       
            
            
            'ket' => $this->text(),
            'created_at'=>$this->datetime(),
            'updated_at'=>$this->datetime(),
            
             

        ]);

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
