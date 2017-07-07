<?php

use yii\db\Migration;

class m170705_043113_create_tb_setting extends Migration
{
       const TABLE_NAME = 'tb_setting';
    public function up()
    {
          $this->createTable(self::TABLE_NAME, [
            //data thn_ajaran
              
            'id_setting' => $this->primaryKey(),
            'id_thn_ajaran' => $this->integer()->Null(),
            'semester'=> "Enum('Gasal','Genap') NOT NULL ",
            'id_kepsek' => $this->integer()->Null(),   
           
            
            'ket' => $this->text(),
            'created_at'=>$this->datetime(),
            'updated_at'=>$this->datetime(),
            
             

        ]);
            
        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-tb_m_thn_ajaran-id_thn_ajaran',
            'tb_setting',
            'id_thn_ajaran',
            'tb_m_thn_ajaran',
            'id_thn_ajaran',
            'RESTRICT',
            'CASCADE'    
        );
        
        
        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-tb_m_thn_ajaran-id_kepsek',
            'tb_setting',
            'id_kepsek',
            'tb_m_karyawan',
            'id_karyawan',
            'RESTRICT',
            'CASCADE'    
        );

                $this->execute("INSERT INTO `tb_setting` (semester) VALUES ('Gasal')");
    }

    public function down()
    {
           $this->dropTable(self::TABLE_NAME);
    }
}
