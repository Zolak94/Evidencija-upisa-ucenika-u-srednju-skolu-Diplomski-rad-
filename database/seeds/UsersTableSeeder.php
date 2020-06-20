<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Nemanja Zolak',
                'email' => 'n.zotek94@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$ABNkzKp3lZvQbHeNcHHE5ODjWjxp02sWsPzQMMlS677Pwb8nej/yy',
                'remember_token' => NULL,
                'created_at' => '2020-06-19 19:11:36',
                'updated_at' => '2020-06-19 19:11:36',
            ),
        ));
        
        
    }
}