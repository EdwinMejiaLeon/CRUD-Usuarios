<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                [
                    #'id'           => 1,
                    'name'          => 'Edwin Mejia',
                    'email'         => 'jemejial@unal.edu.co',
                    'role'          => 'admin',
                    'state'         => True,
                    'password'      => bcrypt('123456789'),
                    'created_at'    => Carbon::now(),
                    'updated_at'    => Carbon::now(),
                ],
                [
                    #'id'           => 2,
                    'name'          => 'Rosa Escobar',
                    'email'         => 'rosa@unal.edu.co',
                    'role'          => 'user_basic',
                    'state'         => True,
                    'password'      => bcrypt('123456789'),
                    'created_at'    => Carbon::now(),
                    'updated_at'    => Carbon::now(),
                ],
                [
                    #'id'           => 3,
                    'name'          => 'Mateo Perez Sosa',
                    'email'         => 'mateo@unal.edu.co',
                    'role'          => 'supervisor',
                    'state'         => True,
                    'password'      => bcrypt('123456789'),
                    'created_at'    => Carbon::now(),
                    'updated_at'    => Carbon::now(),
                ],
            ]
        );
    }
}
