<?php

namespace Database\Seeders;

use App\Models\Issue;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Group::create([
            'name'=>'Developres',
            'description'=>'backEnd , FrontEnd , Tester'
        ]);

        \App\Models\Group::create([
            'name'=>'Manegers',
            'description'=>'CEO, TeamLeader'
        ]);
    }
}
