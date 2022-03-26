<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Todo extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'title'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '150',
                'null'    =>     false,
            ],
            
            'status'      => [
                'type'           => 'CHAR',
                'constraint'     => '1',
                'default'        => 'A',
            ],
            'category_id'      => [
                'type'           => 'INT',
                'constraint'     => '5',
                'null'        => false,
            ],

        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('todos');
    }

    public function down()
    {
        //
        $this->forge->dropTable('todos');
    }
}
