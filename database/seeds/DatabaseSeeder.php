<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Creating initial user instances of 3 */

        /* create a student instance */
        DB::table('users')->insert([
            'name' => 'steve',
            'email' => 'steve@tutsapp.com',
            'password' => bcrypt('password'),
            'type' => 'student',
            'status' => 'active'
        ]);

        /*Creating mentor instance */
        DB::table('users')->insert([
            'name' => 'kevin',
            'email' => 'kevin@tutsapp.com',
            'password' => bcrypt('password'),
            'type' => 'mentor',
            'status' => 'active'
        ]);

        /*Creating Admin instance */
        DB::table('users')->insert([
            'name' => 'alex',
            'email' => 'alex@tutsapp.com',
            'password' => bcrypt('password'),
            'type' => 'admin',
            'status' => 'active'
        ]);
    }
}
