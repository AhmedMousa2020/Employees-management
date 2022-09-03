<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\User;
use App\Models\Issue;
use App\Models\Label;
use Illuminate\Database\Seeder;

class EmployeesgroupRelationshipsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\EmployeeGroup::create([
            'employee_id'=>'1',
            'group_id'=>'1'
        ]);

        \App\Models\EmployeeGroup::create([
            'employee_id'=>'2',
            'group_id'=>'2'
        ]);
    }
}
