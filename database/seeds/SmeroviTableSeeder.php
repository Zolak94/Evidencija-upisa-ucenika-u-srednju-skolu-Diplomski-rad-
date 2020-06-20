<?php

use Illuminate\Database\Seeder;

class SmeroviTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('smerovi')->delete();
        
        \DB::table('smerovi')->insert(array (
            0 => 
            array (
                'id' => 1,
                'naziv' => 'Elektrotehničar računara',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'naziv' => 'Opšti smer',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'naziv' => 'Matematički smer',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'naziv' => 'Elektrotehničar automatike',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}