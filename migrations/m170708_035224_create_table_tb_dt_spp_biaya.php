<?php

use yii\db\Migration;

class m170708_035224_create_table_tb_dt_spp_biaya extends Migration
{
       const TABLE_NAME = 'tb_dt_spp_biaya';
    public function up()
    {
       $this->createTable(self::TABLE_NAME, [
            //data spp
            'id_det_spp' => $this->primaryKey(),
            'id_spp' => $this->integer()->Null(),
            
            'id_biaya' => $this->integer()->notNull(),
      
            'total_biaya' => $this->money(19,2)->notNull(),

         ]);
       
         $this->addForeignKey(
            'fk-tb_dt_spp_biaya-id_spp',
            'tb_dt_spp_biaya',
            'id_spp',
            'tb_mt_spp',
            'id_spp',
            'CASCADE',
            'CASCADE'    
         );
           // add foreign key for table `user`
        $this->addForeignKey(
            'fk-tb_dt_spp_biaya-id_biaya',
            'tb_dt_spp_biaya',
            'id_biaya',
            'tb_m_biaya',
            'id_biaya',
            'CASCADE',
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
