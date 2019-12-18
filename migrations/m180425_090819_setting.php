<?php

use yii\db\Migration;

/**
 * Class m180425_090819_setting
 */
class m180425_090819_setting extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('setting', [
            'id' => $this->primaryKey(),
            'setting_key' => $this->string(200)->notNull(),
			'value' => $this->string(200)->notNull(),
        ], $tableOptions);
	
	$this->insert('setting', [
            'setting_key' => 'home',
            'value' => '1',
        ]);

        $this->insert('setting', [
            'setting_key' => 'signup',
            'value' => 'true',
        ]);

        $this->insert('setting', [
            'setting_key' => 'about',
            'value' => 'true',
        ]);

        $this->insert('setting', [
            'setting_key' => 'login',
            'value' => 'true',
        ]);

        $this->insert('setting', [
            'setting_key' => 'contact',
            'value' => 'true',
        ]);

        $this->insert('setting', [
            'setting_key' => 'language',
            'value' => 'tr-TR',
        ]);

	$this->insert('setting', [
            'setting_key' => 'title',
            'value' => 'Portal',
        ]);

    }

    public function down()
    {
        $this->dropTable('setting');
    }
}
