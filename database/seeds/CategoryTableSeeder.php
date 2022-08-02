<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
        'name' => '上野原市スポット',
        'created_at' => new DateTime(),
        'updated_at' => new DateTime(),
    ]);
        DB::table('categories')->insert([
        'name' => 'ゆずりはら',
        'created_at' => new DateTime(),
        'updated_at' => new DateTime(),
    ]);
        DB::table('categories')->insert([
        'name' => '上野原カフェ',
        'created_at' => new DateTime(),
        'updated_at' => new DateTime(),
    ]);
        DB::table('categories')->insert([
        'name' => 'レジャー',
        'created_at' => new DateTime(),
        'updated_at' => new DateTime(),
    ]);
    }
}
