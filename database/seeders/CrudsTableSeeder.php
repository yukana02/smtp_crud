<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\CrudsTableSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;


class CrudsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 100) as $index) {
            \DB::table('cruds')->insert([
                'title' => $faker->sentence,
                'iduser' => 2, // Ubah sesuai kebutuhan
                'content' => $faker->paragraph,
                'images' => 'Olr1FL4nzMFsdzGgdbJU0F4DCpL6UtsjXB419W98.png', // Gantilah dengan nama gambar yang diinginkan
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

// Jalankan Seeder saat file di-include
(new CrudsTableSeeder())->run();
