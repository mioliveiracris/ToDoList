<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'category' => 'Casa',
        ];
        $this->db->table('categories')->insert($data);

        $data = [
            'category' => 'Trabalho',
        ];
        $this->db->table('categories')->insert($data);

        $data = [
            'category' => 'Outros',
        ];
        $this->db->table('categories')->insert($data);
    }
}
