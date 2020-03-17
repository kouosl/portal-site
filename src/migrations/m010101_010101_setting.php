<?php

use yii\db\Migration;

class m010101_010101_setting extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('setting', [
            'id' => $this->primaryKey(),
            'key' => $this->string(200)->notNull(),
			'value' => $this->string(200)->notNull(),
        ], $tableOptions);

        $this->insert('setting', [
            'key' => 'title',
            'value' => 'Portal',
        ]);

        $this->insert('setting', [
            'key' => 'language',
            'value' => 'en-US',
        ]);

        $this->insert('setting', [
            'key' => 'languages',
            'value' => '{"en-US":"English","tr-TR":"Turkish"}',
        ]);

        $this->insert('setting', [
            'key' => 'page_home',
            'value' => 'Portal',
        ]);

        $this->insert('setting', [
            'key' => 'page_signup',
            'value' => 'true',
        ]);

        $this->insert('setting', [
            'key' => 'page_about',
            'value' => 'true',
        ]);

        $this->insert('setting', [
            'key' => 'page_login',
            'value' => 'true',
        ]);

        $this->insert('setting', [
            'key' => 'page_contact',
            'value' => 'true',
        ]);

        $this->insert('setting', [
            'key' => 'email_address',
            'value' => 'info@portalium.dev',
        ]);

        $this->insert('setting', [
            'key' => 'email_display_name',
            'value' => 'Portal',
        ]);

        $this->insert('setting', [
            'key' => 'smtp_server',
            'value' => 'smtp.gmail.com',
        ]);

        $this->insert('setting', [
            'key' => 'smtp_port',
            'value' => '565',
        ]);

        $this->insert('setting', [
            'key' => 'smtp_username',
            'value' => '',
        ]);

        $this->insert('setting', [
            'key' => 'smtp_password',
            'value' => '',
        ]);

    }

    public function down()
    {
        $this->dropTable('setting');
    }
}