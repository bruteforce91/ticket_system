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
        [
        'id' => 1,
        'name'=> 'Mario',
        'email'=> 'mariorossi@gmail.com',
        'password'=> '12345678',
      ],
  //     [
  //     'id' => 2,
  //     'name'=> 'Salvatore',
  //     'email'=> 'salvatore@gmail.com',
  //     'password'=> '12345678',
  //   ],
  //   [
  //   'id' => 3,
  //   'name'=> 'Elisa',
  //   'email'=> 'elisa@gmail.com',
  //   'password'=> '12345678',
  // ],
      ]);
    }
}
