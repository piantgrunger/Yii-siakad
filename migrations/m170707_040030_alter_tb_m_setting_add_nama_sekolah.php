<?php

use yii\db\Migration;

class m170707_040030_alter_tb_m_setting_add_nama_sekolah extends Migration
{
    public function up()
    {
        $this->addColumn('tb_setting', 'nama_sekolah', $this->string(50));
        $this->addColumn('tb_setting', 'alamat_sekolah', $this->text());
    }

    public function down()
    {
       $this->dropColumn('tb_setting', 'nama_sekolah');
       $this->dropColumn('tb_setting', 'alamat_sekolah');
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
