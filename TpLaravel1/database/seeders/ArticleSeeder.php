<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ArticleSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('article')->insert([
            'name' => Str::random(10),
            'description' => 'admin@gmail.com',
            'category' => Hash::make('password'),
            'IsAdmin' => true
        ]);
    }
}
