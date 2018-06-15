<?php

use Illuminate\Database\Seeder;

class RecipeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Recipe::query()->delete();

        (new Faker\Generator)->seed(21);

        factory(App\Recipe::class, 15)->create();
    }
}
