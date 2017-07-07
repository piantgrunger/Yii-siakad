<?php

use yii\db\Migration;

class m170302_092158_create_tb_m_karyawan extends Migration
{
    const TABLE_NAME = 'tb_m_karyawan';
    public function up()
    {
       
        $this->createTable(self::TABLE_NAME, [
            //data karyawan
            'id_karyawan' => $this->primaryKey(),
            'kode_karyawan' => $this->string(50)->notNull()->unique(),
            'nama_karyawan' => $this->string(50)->notNull(),
            'foto_karyawan' => $this->string(200),
            'telp_karyawan' => $this->string(50),
            'alamat_karyawan' => $this->text(),
            'no_id' => $this->string(50),
            'tempat_lahir' => $this->string(50),
            'tgl_lahir' => $this->date()->notNull(),
            'jns_kelamin'=> "Enum('Laki-Laki','Perempuan') NOT NULL "   , 
            'stat_nikah'=> "Enum('Menikah','Belum Menikah','Janda','Duda') NOT NULL "   , 
            'agama'=>"Enum('Islam','Kristen Protestan','Kristen Katolik','Hindu','Budha','Konghocu') NOT NULL "  ,
            
            //data pekerjaan
            'tgl_masuk' => $this->date()->notNull(),
            'tgl_keluar' => $this->date(),
            'stat_karyawan'=> "Enum('Tetap','Kontrak','Percobaan') NOT NULL "   , 
            'stat_pekerjaan'=> "Enum('Guru','Tata Usaha','Lain-Lain') NOT NULL "   , 
           
            
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
