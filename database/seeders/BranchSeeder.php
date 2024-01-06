<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $branches = [
            ['id' => 1, 'nama' => 'Cianjur', 'alamat' => 'Cianjur', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('branches')->insert($branches);
    }
}

