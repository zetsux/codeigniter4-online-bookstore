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
            'title'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'description'       => [
                'type'       => 'TEXT'
            ],
            'price'       => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'stock'       => [
                'type'       => 'INTEGER',
                'constraint' => '10',
            ],
            'author'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'publisher'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'genre'       => [
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
        $this->forge->createTable('books');
    }

    public function down()
    {
        $this->forge->dropTable('books');
    }
}
