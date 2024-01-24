<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class CrudsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 100) as $index) {
            DB::table('cruds')->insert([
                'title' => $faker->sentence,
                'iduser' => 1, // Ubah sesuai kebutuhan
                'content' => $faker->paragraph,
                'image' => 'Olr1FL4nzMFsdzGgdbJU0F4DCpL6UtsjXB419W98.png', // Gantilah dengan nama gambar yang diinginkan
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

// Jalankan Seeder saat file di-include
(new CrudsTableSeeder())->run();
