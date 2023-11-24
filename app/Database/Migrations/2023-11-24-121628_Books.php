<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Books extends Migration
{
    public function up()
    {
        // Foreign Key user
        $this->forge->addField([
            'id'          => [
                'type'       => 'VARCHAR',
                'constraint' => '36'
            ],
            'user_id'       => [
                'type' => 'VARCHAR',
                'constraint' => '36'
            ],
            'title'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'author'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'publisher'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'cover'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');

        $this->forge->createTable('books');
    }

    public function down()
    {
        //
    }
}
