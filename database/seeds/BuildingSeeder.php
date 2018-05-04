<?php

use Illuminate\Database\Seeder;

class BuildingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = \Faker\Factory::create();
        for($i = 0 ; $i <600 ; $i++){
            \App\BU::create([
                'bu_name'=>$faker->name,
                'bu_price' =>$faker->numberBetween(10000,500000),
                'bu_rent'=>$faker->numberBetween(0,1),
                'bu_square'=>$faker->numberBetween(90,300),
                'bu_type'=>$faker->numberBetween(0,2),
                'bu_small_dis'=>$faker->sentence(10),
                'bu_meta'=>$faker->sentence(15),
                'bu_langtuite'=>$faker->randomFloat(10,29.924526,31.2933),
                'bu_latitude'=>$faker->randomFloat(10,27.180134,31.205753),
                'bu_larg_dis'=>$faker->numberBetween(30,35),
                'bu_status'=>'1',
                'user_id'=>$faker->numberBetween(1,10),
                'rooms'=>$faker->numberBetween(3,30),
                'bu_place'=>$faker->numberBetween(0,2),
                'image'=>'es.png'
            ]);
        }
    }
}
