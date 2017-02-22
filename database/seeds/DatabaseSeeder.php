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
            'status' => 1
        ]);

        /*Creating mentor instance */
        DB::table('users')->insert([
            'name' => 'kevin',
            'email' => 'kevin@tutsapp.com',
            'password' => bcrypt('password'),
            'type' => 'mentor',
            'status' => 1
        ]);

        /*Creating Admin instance */
        DB::table('users')->insert([
            'name' => 'alex',
            'email' => 'alex@tutsapp.com',
            'password' => bcrypt('password'),
            'type' => 'admin',
            'status' => 0
        ]);

        /*create a course*/
        DB::table('courses')->insert([
            'name' => 'the very first course',
            'description' => 'some descriptions',
            'cover' => '1486996089GUjqJsiW5l.jpg',
            'user_id'=>2,
            'status' =>1
        ]);

        /*create a chapter*/
        DB::table('chapters')->insert([
            'name' => 'the very first chapter',
            'notes' => 'some notes here and there',
            'pdf' => '1485311667Uv69TNR6si.pdf',
            'video'=>'1485311628LyLzRCmjiH.mp4',
            'course_id'=>1
        ]);
    }
}
