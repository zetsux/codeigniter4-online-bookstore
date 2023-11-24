<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BookSeeder extends Seeder
{
  public function run()
  {
    $faker = \Faker\Factory::create();
    $data = [];

    for ($i = 0; $i < 20; $i++) {
      $data[] = [
        'id' => $faker->uuid,
        'title' => $faker->sentence(3),
        'description' => $faker->paragraph,
        'price' => $faker->randomFloat(2, 10, 100),
        'author' => $faker->name,
        'publisher' => $faker->company,
        'genre' => $faker->word,
        'cover' => $faker->imageUrl(200, 300),
      ];
    }

    $this->db->table('books')->insertBatch($data);
  }
}
