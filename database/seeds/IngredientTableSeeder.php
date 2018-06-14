<?php

use Illuminate\Database\Seeder;

class IngredientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Ingredient::truncate();

        (new Faker\Generator)->seed(121);

        factory(App\Ingredient::class, 50)->create();
    }
}
