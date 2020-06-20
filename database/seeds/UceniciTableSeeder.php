<?php

use Illuminate\Database\Seeder;

class UceniciTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ucenici')->delete();
        
        \DB::table('ucenici')->insert(array (
            0 => 
            array (
                'id' => 1,
                'ime_prezime' => 'Nemanja Zolak',
                'datum_rodjenja' => '2007-05-17',
                'broj_bodova' => '68.00',
                'jmbg' => 1705994850250,
                'pol' => 1,
                'odeljenje_id' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'ime_prezime' => 'Jovan Jovanović',
                'datum_rodjenja' => '2007-10-18',
                'broj_bodova' => '89.00',
                'jmbg' => 1810007850264,
                'pol' => 1,
                'odeljenje_id' => NULL,
                'created_at' => '2020-06-20 12:08:01',
                'updated_at' => '2020-06-20 12:08:01',
            ),
            2 => 
            array (
                'id' => 3,
                'ime_prezime' => 'Marija Marić',
                'datum_rodjenja' => '2020-06-20',
                'broj_bodova' => '94.00',
                'jmbg' => 3011007750226,
                'pol' => 2,
                'odeljenje_id' => NULL,
                'created_at' => '2020-06-20 12:08:44',
                'updated_at' => '2020-06-20 12:34:26',
            ),
            3 => 
            array (
                'id' => 4,
                'ime_prezime' => 'Dragan Torbica',
                'datum_rodjenja' => '2008-06-01',
                'broj_bodova' => '61.00',
                'jmbg' => 106008850459,
                'pol' => 1,
                'odeljenje_id' => NULL,
                'created_at' => '2020-06-20 12:35:02',
                'updated_at' => '2020-06-20 12:35:02',
            ),
            4 => 
            array (
                'id' => 5,
                'ime_prezime' => 'Milica Torbica',
                'datum_rodjenja' => '2009-02-05',
                'broj_bodova' => '83.00',
                'jmbg' => 502009750892,
                'pol' => 2,
                'odeljenje_id' => NULL,
                'created_at' => '2020-06-20 12:35:36',
                'updated_at' => '2020-06-20 12:35:36',
            ),
        ));
        
        
    }
}