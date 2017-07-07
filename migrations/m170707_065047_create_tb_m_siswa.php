<?php

use yii\db\Migration;

class m170707_065047_create_tb_m_siswa extends Migration
{
    const TABLE_NAME = 'tb_m_siswa';
    public function up()
    {
     $this->createTable(self::TABLE_NAME, [
            //data siswa
            'id_siswa' => $this->primaryKey(),
            'kode_siswa' => $this->string(50)->notNull()->unique(),
            'nama_siswa' => $this->string(50)->notNull(),
            'nama_panggilan' => $this->string(50)->notNull(),
         
            'foto_siswa' => $this->string(200),
            'telp_siswa' => $this->string(50),
            'alamat_siswa' => $this->text(),
            'tempat_lahir' => $this->string(50),
            'tgl_lahir' => $this->date()->notNull(),
            'jns_kelamin'=> "Enum('Laki-Laki','Perempuan') NOT NULL "   , 
            'anak_ke' => $this->integer(),
            'jml_saudara' => $this->integer(),
         
            'status_anak'=>"Enum('Anak Kandung','Anak Tiri','Anak Angkat') NOT NULL "  ,
            
         
            'agama'=>"Enum('Islam','Kristen Protestan','Kristen Katolik','Hindu','Budha','Konghocu') NOT NULL "  ,
            'gol_darah'=>"Enum('A','B','AB','O')  NULL "  ,
            'Warga_Negara'=>"Enum('WNI','WNA') NOT NULL "  ,
         
          //ayah
            'nama_ayah' => $this->string(50)->notNull(),
            'telp_ayah' => $this->string(50),
            'alamat_ayah' => $this->text(),
            'pekerjaan_ayah' => $this->string(50),
    
         //ibu
            'nama_ibu' => $this->string(50)->notNull(),
            'telp_ibu' => $this->string(50),
            'alamat_ibu' => $this->text(),
            'pekerjaan_ibu' => $this->string(50),
    
         
         //wali
            'nama_wali' => $this->string(50),
            'telp_wali' => $this->string(50),
            'alamat_wali' => $this->text(),
            'pekerjaan_wali' => $this->string(50),
    
            
            //data siswa
            'tgl_masuk' => $this->date()->notNull(),
            'tgl_lulus' => $this->date(),
         
            
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
