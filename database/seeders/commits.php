<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class commits extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('commits')->insert([
        [
        'id' => 1,
        'employeeID'=> 7,
        'taskID'=> 1,
        'title'=> 'refactor css',
        'description'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
      ],
        ['id' => 2,
        'employeeID'=> 7,
        'taskID'=> 1,
        'title'=> 'feat:new cart',
        'description'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
      ],
        ['id' => 3,
        'employeeID'=> 8,
        'taskID'=> 3,
        'title'=> 'fix:solved bugs',
        'description'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
      ],
        ['id' => 4,
        'employeeID'=> 8,
        'taskID'=> 2,
        'title'=> 'chore:css',
        'description'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
      ]
    ]);
  }
}
