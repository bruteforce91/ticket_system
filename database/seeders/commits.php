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
        'employeeID'=> 2,
        'taskID'=> 1,
        'title'=> 'refactor css',
        'description'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
      ],
        ['id' => 2,
        'employeeID'=> 2,
        'taskID'=> 1,
        'title'=> 'feat:new cart',
        'description'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
      ],
        ['id' => 3,
        'employeeID'=> 3,
        'taskID'=> 2,
        'title'=> 'fix:solved bugs',
        'description'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
      ],
        ['id' => 4,
        'employeeID'=> 3,
        'taskID'=> 2,
        'title'=> 'chore:css',
        'description'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
      ],
      [
      'id' => 5,
      'employeeID'=> 4,
      'taskID'=> 3,
      'title'=> 'refactor css',
      'description'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
    ],
      ['id' => 6,
      'employeeID'=> 4,
      'taskID'=> 3,
      'title'=> 'feat:new cart',
      'description'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
    ],
      ['id' => 7,
      'employeeID'=> 5,
      'taskID'=> 4,
      'title'=> 'fix:solved bugs',
      'description'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
    ],
      ['id' => 8,
      'employeeID'=> 5,
      'taskID'=> 4,
      'title'=> 'chore:css',
      'description'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
    ],
    [
    'id' => 9,
    'employeeID'=> 6,
    'taskID'=> 1,
    'title'=> 'refactor css',
    'description'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
  ],
    ['id' => 10,
    'employeeID'=> 6,
    'taskID'=> 2,
    'title'=> 'feat:new cart',
    'description'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
  ],
    ['id' => 11,
    'employeeID'=>7 ,
    'taskID'=> 3,
    'title'=> 'fix:solved bugs',
    'description'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
  ],
    ['id' => 12,
    'employeeID'=> 7,
    'taskID'=> 4,
    'title'=> 'chore:css',
    'description'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
  ]
    ]);
  }
}
