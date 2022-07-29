<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    // 省略

public function run()
{
    $this->call(QuestionSeeder::class);
}
}
