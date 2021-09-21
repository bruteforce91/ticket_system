<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DateTime;
use DB;
class tasks extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('tasks')->insert([
        [
        'id' => 1,
        'description'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
        'deadline'=>new DateTime(),
        'status'=> 'to do'
      ],
        [
        'id' => 2,
        'description'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
        'deadline'=>new DateTime(),
        'status'=> 'blocked'
      ],
        [
        'id' => 3,
        'description'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
        'deadline'=>new DateTime(),
        'status'=> 'to do'
      ],
        [
        'id' => 4,
        'description'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
        'deadline'=>new DateTime(),
        'status'=> 'review'
      ],
    ]);
  }
}
