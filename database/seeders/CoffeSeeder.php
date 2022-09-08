<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CoffeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 30; $i++) {
            DB::table('coffees')
                ->insert([
                    'name' => Str::random(8),
                    'type_name' => Str::random(5),
                    'calories' => random_int(100, 500)
                ]);
        }
    }
}
