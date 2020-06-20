<?php

use Illuminate\Database\Seeder;

class StaresineTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('staresine')->delete();
        
        \DB::table('staresine')->insert(array (
            0 => 
            array (
                'id' => 1,
                'ime_prezime' => 'Dragana Dragojević',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'ime_prezime' => 'Milovan Milićević',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'ime_prezime' => 'Dragica Zdravković',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}