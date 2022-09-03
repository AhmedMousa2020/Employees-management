<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Employee::create([
            'name'=>'Ahmed Samir',
            'role'=>'Developer',
            'email'=>'samir@gmail.com',
            'group_id'=>'1'
        ]);

        \App\Models\Employee::create([
            'name'=>'Khalid Mahmoud',
            'role'=>'Manger',
            'email'=>'Khalid@gmail.com',
            'group_id'=>'2'
        ]);
    }
}
