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
        'id' => 1,
        'name'=> 'Mario',
        'surname'=> 'Rossi',
        'badgeID'=>  'mr1',
        'email'=> 'mariorossi@gmail.com',
        'password'=> '12345678',
      ]);
    }
}
