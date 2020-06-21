<?php

use Illuminate\Database\Seeder;
// use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(StaresineTableSeeder::class);
        $this->call(SmeroviTableSeeder::class);
        $this->call(UceniciTableSeeder::class);
        // $faker = Faker::create('sr_Latn_RS');
    	// foreach (range(1,10) as $index) {
        //     $gender = $faker->randomElement(['male', 'female']);
        //     if ($gender == 'male') {
        //         $pol = 1;
        //         $jmbg_pol = 850;
        //         $ime =  $faker->firstNameMale();
        //     } else {
        //         $pol = 2;
        //         $jmbg_pol = 750;
        //         $ime =  $faker->firstNameFemale();
        //     }
        //     $rodjendan = $faker->dateTimeBetween('2007-01-01', '2007-12-31');
        //     $jmbg = \Carbon\Carbon::parse($rodjendan)->format('dmY');
        //     $jmbg .= $jmbg_pol.$faker->numberBetween(100,999);
	    //     DB::table('ucenici')->insert([
	    //         'ime_prezime' => $ime.' '.$faker->lastName(),
	    //         'datum_rodjenja' => $faker->dateTimeBetween('2007-01-01', '2007-12-31'),
        //         'pol' => $pol,
        //         'jmbg' => $jmbg,
        //         'broj_bodova' => $faker->numberBetween(50,100),
        //         'odeljenje_id' => null
	    //     ]);
	    // }
    }
}
