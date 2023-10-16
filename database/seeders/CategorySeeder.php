<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('categories')->insert([
                'name' => 'WPI',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         DB::table('categories')->insert([
                'name' => 'WPc',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         DB::table('categories')->insert([
                'name' => 'ウエイトゲイナー',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         DB::table('categories')->insert([
                'name' => 'ソイプロテイン',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         DB::table('categories')->insert([
                'name' => 'ガゼインプロテイン',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
    }
}
