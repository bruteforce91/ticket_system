<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class employees extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
      DB::table('employees')->insert([
        [
        'id' => 1,
        'name'=> 'Mario',
        'badgeID'=>  'mr1',
        'email'=> 'mariorossi@gmail.com',
        'password'=> '12345678',
      ],
      // [
      //   'id' => 2,
      //   'name'=> 'Salvatore',
      //   'badgeID'=>  'DEVsalvo',
      //   'email'=> 'salvatore@gmail.com',
      //   'password'=> '12345678',
      // ],
      // [
      //   'id' => 3,
      //   'name'=> 'Elisa',
      //   'badgeID'=>  'PMelisa',
      //   'email'=> 'elisa@gmail.com',
      //   'password'=> '12345678',
      // ],
      ]);
    }
}
