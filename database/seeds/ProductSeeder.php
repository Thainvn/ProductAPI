<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker =  Faker::create();

        foreach (range(1,30) as $index) {

	        DB::table('products')->insert([
	        	
	            'name' => $faker->name,
	            'description' => $faker->paragraph,
	            'price' => $faker->randomDigit,
	            'sale' => $faker->randomDigit,
	            'category' => $faker->name,
	            
	        ]);
		}

    }
}
