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
                'jmbg' => '1705994850250',
                'pol' => 1,
                'odeljenje_id' => NULL,
                'smer_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'ime_prezime' => 'Jovan Jovanović',
                'datum_rodjenja' => '2007-10-18',
                'broj_bodova' => '89.00',
                'jmbg' => '1810007850264',
                'pol' => 1,
                'odeljenje_id' => NULL,
                'smer_id' => 1,
                'created_at' => '2020-06-20 12:08:01',
                'updated_at' => '2020-06-20 12:08:01',
            ),
            2 => 
            array (
                'id' => 3,
                'ime_prezime' => 'Marija Marić',
                'datum_rodjenja' => '2020-06-20',
                'broj_bodova' => '94.00',
                'jmbg' => '3011007750226',
                'pol' => 2,
                'odeljenje_id' => NULL,
                'smer_id' => 1,
                'created_at' => '2020-06-20 12:08:44',
                'updated_at' => '2020-06-20 12:34:26',
            ),
            3 => 
            array (
                'id' => 4,
                'ime_prezime' => 'Dragan Torbica',
                'datum_rodjenja' => '2008-06-01',
                'broj_bodova' => '61.00',
                'jmbg' => '106008850459',
                'pol' => 1,
                'odeljenje_id' => NULL,
                'smer_id' => 1,
                'created_at' => '2020-06-20 12:35:02',
                'updated_at' => '2020-06-20 12:35:02',
            ),
            4 => 
            array (
                'id' => 5,
                'ime_prezime' => 'Milica Torbica',
                'datum_rodjenja' => '2007-02-05',
                'broj_bodova' => '83.00',
                'jmbg' => '0502007750892',
                'pol' => 2,
                'odeljenje_id' => NULL,
                'smer_id' => 1,
                'created_at' => '2020-06-20 12:35:36',
                'updated_at' => '2020-06-21 16:18:48',
            ),
            5 => 
            array (
                'id' => 6,
                'ime_prezime' => 'Đurđina Jokić',
                'datum_rodjenja' => '2007-02-15',
                'broj_bodova' => '96.00',
                'jmbg' => '1502007750462',
                'pol' => 2,
                'odeljenje_id' => NULL,
                'smer_id' => 2,
                'created_at' => '2020-06-21 15:52:53',
                'updated_at' => '2020-06-21 15:52:53',
            ),
            6 => 
            array (
                'id' => 7,
                'ime_prezime' => 'Tanja Savić',
                'datum_rodjenja' => '2007-08-25',
                'broj_bodova' => '58.00',
                'jmbg' => '2508007750694',
                'pol' => 2,
                'odeljenje_id' => NULL,
                'smer_id' => 1,
                'created_at' => '2020-06-21 15:55:55',
                'updated_at' => '2020-06-21 15:55:55',
            ),
            7 => 
            array (
                'id' => 8,
                'ime_prezime' => 'Obrad Obradović',
                'datum_rodjenja' => '2007-02-02',
                'broj_bodova' => '52.00',
                'jmbg' => '0202007850228',
                'pol' => 1,
                'odeljenje_id' => NULL,
                'smer_id' => 1,
                'created_at' => '2020-06-21 16:16:10',
                'updated_at' => '2020-06-21 16:16:10',
            ),
            8 => 
            array (
                'id' => 9,
                'ime_prezime' => 'Ivan Ivanović',
                'datum_rodjenja' => '2007-12-03',
                'broj_bodova' => '87.00',
                'jmbg' => '0312007850620',
                'pol' => 1,
                'odeljenje_id' => NULL,
                'smer_id' => 1,
                'created_at' => '2020-06-21 16:16:57',
                'updated_at' => '2020-06-21 16:16:57',
            ),
            9 => 
            array (
                'id' => 10,
                'ime_prezime' => 'Jovan Milićev',
                'datum_rodjenja' => '2007-05-05',
                'broj_bodova' => '73.00',
                'jmbg' => '0505007850240',
                'pol' => 1,
                'odeljenje_id' => NULL,
                'smer_id' => 1,
                'created_at' => '2020-06-21 16:17:26',
                'updated_at' => '2020-06-21 16:17:26',
            ),
            10 => 
            array (
                'id' => 11,
                'ime_prezime' => 'Bojan Lekić',
                'datum_rodjenja' => '2007-03-19',
                'broj_bodova' => '78.00',
                'jmbg' => '1903007850292',
                'pol' => 1,
                'odeljenje_id' => NULL,
                'smer_id' => 1,
                'created_at' => '2020-06-21 16:19:48',
                'updated_at' => '2020-06-21 16:19:48',
            ),
            11 => 
            array (
                'id' => 12,
                'ime_prezime' => 'Nebojša Orlović',
                'datum_rodjenja' => '2007-03-06',
                'broj_bodova' => '79.00',
                'jmbg' => '0603007850820',
                'pol' => 1,
                'odeljenje_id' => NULL,
                'smer_id' => 1,
                'created_at' => '2020-06-21 16:20:25',
                'updated_at' => '2020-06-21 16:20:25',
            ),
            12 => 
            array (
                'id' => 13,
                'ime_prezime' => 'Maja Majić',
                'datum_rodjenja' => '2007-04-12',
                'broj_bodova' => '70.00',
                'jmbg' => '1204007750250',
                'pol' => 2,
                'odeljenje_id' => NULL,
                'smer_id' => 1,
                'created_at' => '2020-06-21 16:20:58',
                'updated_at' => '2020-06-21 16:20:58',
            ),
            13 => 
            array (
                'id' => 14,
                'ime_prezime' => 'Nikolina Nikić',
                'datum_rodjenja' => '2007-11-22',
                'broj_bodova' => '80.00',
                'jmbg' => '2211007750647',
                'pol' => 2,
                'odeljenje_id' => NULL,
                'smer_id' => 1,
                'created_at' => '2020-06-21 16:21:43',
                'updated_at' => '2020-06-21 16:21:43',
            ),
            14 => 
            array (
                'id' => 15,
                'ime_prezime' => 'Nemanja Skelić',
                'datum_rodjenja' => '2007-10-15',
                'broj_bodova' => '88.00',
                'jmbg' => '1510007850451',
                'pol' => 1,
                'odeljenje_id' => NULL,
                'smer_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'ime_prezime' => 'Mihailo Sladić',
                'datum_rodjenja' => '2007-10-06',
                'broj_bodova' => '99.00',
                'jmbg' => '0610007850149',
                'pol' => 1,
                'odeljenje_id' => NULL,
                'smer_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'ime_prezime' => 'Jevrem Ekmedžić',
                'datum_rodjenja' => '2007-04-12',
                'broj_bodova' => '91.00',
                'jmbg' => '1204007850114',
                'pol' => 1,
                'odeljenje_id' => NULL,
                'smer_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'ime_prezime' => 'Damjan Čaprnjić',
                'datum_rodjenja' => '2007-06-01',
                'broj_bodova' => '90.00',
                'jmbg' => '0106007850124',
                'pol' => 1,
                'odeljenje_id' => NULL,
                'smer_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'ime_prezime' => 'Milana Oraovčić',
                'datum_rodjenja' => '2007-05-17',
                'broj_bodova' => '93.00',
                'jmbg' => '1705007750851',
                'pol' => 2,
                'odeljenje_id' => NULL,
                'smer_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'ime_prezime' => 'Gordana Budinčić',
                'datum_rodjenja' => '2007-06-14',
                'broj_bodova' => '52.00',
                'jmbg' => '1406007750573',
                'pol' => 2,
                'odeljenje_id' => NULL,
                'smer_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'ime_prezime' => 'Miodrag Lukajić',
                'datum_rodjenja' => '2007-05-18',
                'broj_bodova' => '98.00',
                'jmbg' => '1805007850198',
                'pol' => 1,
                'odeljenje_id' => NULL,
                'smer_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'ime_prezime' => 'Nenad Matejić',
                'datum_rodjenja' => '2007-09-27',
                'broj_bodova' => '77.00',
                'jmbg' => '2709007850469',
                'pol' => 1,
                'odeljenje_id' => NULL,
                'smer_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 23,
                'ime_prezime' => 'Veroljub Skočajić',
                'datum_rodjenja' => '2007-07-28',
                'broj_bodova' => '87.00',
                'jmbg' => '2807007850811',
                'pol' => 1,
                'odeljenje_id' => NULL,
                'smer_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 24,
                'ime_prezime' => 'Kristijan Skakić',
                'datum_rodjenja' => '2007-07-15',
                'broj_bodova' => '56.00',
                'jmbg' => '1507007750121',
                'pol' => 2,
                'odeljenje_id' => NULL,
                'smer_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}