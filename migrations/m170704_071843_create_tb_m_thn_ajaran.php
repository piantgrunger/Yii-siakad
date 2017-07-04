<?php

use yii\db\Migration;

class m170704_071843_create_tb_m_thn_ajaran extends Migration
{
       const TABLE_NAME = 'tb_m_thn_ajaran';
    public function up()
    {
          $this->createTable(self::TABLE_NAME, [
            //data thn_ajaran
            'id_thn_ajaran' => $this->primaryKey(),
            'kode_thn_ajaran' => $this->string(50)->notNull()->unique(),
            'tahun_mulai' => $this->string(4)->notNull(),
            'tahun_selesai' => $this->string(4)->notNull(),
            'tgl_mulai_thn_ajaran' => $this->date()->notNull(),
            'tgl_selesai_thn_ajaran' => $this->date()->notNull(),
            'hari_efektif' => $this->integer(),
            'hari_libur' => $this->integer(),
            'status'=> "Enum('Aktif','Tidak Aktif') NOT NULL "   , 
           
            
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
