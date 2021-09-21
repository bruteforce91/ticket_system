<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
        'id' => 1,
        'name'=> 'Mario',
        'email'=> 'mariorossi@gmail.com',
        'password'=> '12345678',
      ]);
    }
}
