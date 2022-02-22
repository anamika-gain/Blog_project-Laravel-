<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table ('users')->insert([
            'role_id' =>'1',
            'name' =>'Md.Admin',
            'email' => 'admin@blog.com',
            'password' => bcrypt('rootadmin'),

        ]);
        DB::table ('users')->insert([
            'role_id' =>'2',
            'name' =>'Md.Author',
            'email' => 'author@blog.com',
            'password' => bcrypt('rootauthor'),

        ]);
        DB::table ('users')->insert([
            'role_id' =>'3',
            'name' =>'deb',
            'email' => 'debgain@blog.com',
            'password' => bcrypt('root123'),

        ]);
        DB::table ('users')->insert([
            'role_id' =>'4',
            'name' =>'anu',
            'email' => 'anugain@blog.com',
            'password' => bcrypt('root456'),

        ]);
    }
}
