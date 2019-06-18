<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
          'name' => str_random(10),
          'email' => str_random(10).'@gmail.com',
          'role' => 1,
          'password' => bcrypt('password'),
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
        ]);
      DB::table('users')->insert([
        'name' => str_random(10),
        'email' => str_random(10).'@gmail.com',
        'role' => 2,
        'password' => bcrypt('password'),
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ]);
    }
}
