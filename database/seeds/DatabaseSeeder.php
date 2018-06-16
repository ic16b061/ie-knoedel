<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Recipe_Ingredients')->delete();
        DB::table('Recipes')->delete();
        DB::table('Ingredients')->delete();

        $this->call(IngredientTableSeeder::class);
        $this->call(RecipeTableSeeder::class);
    }
}
