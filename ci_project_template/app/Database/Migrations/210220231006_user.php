<?php

namespace App\Database\Migrations;

// use CodeIgniter\Database\Migration;

class User extends \CodeIgniter\Database\Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'username' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'phone' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            // 'password' => [
            //     'type'       => 'VARCHAR',
            //     'constraint' => '100',
            // ],
            // 'user_type' => [
            //     'type'       => 'ENUM("admin","user")',
            //     'null'=>false,
            //     'default'=>'user'
            // ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('user');
    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}