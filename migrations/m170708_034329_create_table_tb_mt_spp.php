<?php

use yii\db\Migration;

class m170708_034329_create_table_tb_mt_spp extends Migration
{
    
    const TABLE_NAME = 'tb_mt_spp';
    
    public function up()
    {
         $this->createTable(self::TABLE_NAME, [
            //data spp
            'id_spp' => $this->primaryKey(),
            'no_spp' => $this->string(50)->notNull()->unique(),
            'tgl_spp' => $this->date()->notNull(),
            'id_thn_ajaran' => $this->integer()->Null(),
            'semester'=> "Enum('Gasal','Genap') NOT NULL ",
            'bulan'=> $this->integer(2)->notNull(),   
           
            'id_siswa' => $this->integer()->notNull(),
      
            'total_spp' => $this->money(19,2)->notNull(),
       
       
            
            
            'ket' => $this->text(),
            'created_at'=>$this->datetime(),
            'updated_at'=>$this->datetime(),
         ]);
         // add foreign key for table `user`
        $this->addForeignKey(
            'fk-tb_mt_spp-id_siswa',
            'tb_mt_spp',
            'id_siswa',
            'tb_m_siswa',
            'id_siswa',
            'RESTRICT',
            'CASCADE'    
        );
                  
        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-tb_mt_spp-id_thn_ajaran',
            'tb_mt_spp',
            'id_thn_ajaran',
            'tb_m_thn_ajaran',
            'id_thn_ajaran',
            'RESTRICT',
            'CASCADE'    
        );
        
  
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
