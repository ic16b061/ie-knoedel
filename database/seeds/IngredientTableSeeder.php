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
        /*
        \App\Ingredient::query()->delete();

        (new Faker\Generator)->seed(121);

        factory(App\Ingredient::class, 50)->create();
        */

        $ingredientSchweineruecken  = \App\Ingredient::create(array('name' => "Schweinerücken"));
        $ingredientOrangensaft      = \App\Ingredient::create(array('name' => "Orangensaft"));
        $ingredientGemuesefond      = \App\Ingredient::create(array('name' => "Gemüsefond"));
        $ingredientVollrohrzucker   = \App\Ingredient::create(array('name' => "Vollrohrzucker"));
        $ingredientEstragonsenf     = \App\Ingredient::create(array('name' => "Estragonsenf"));
        $ingredientPaprikapulverGerMild = \App\Ingredient::create(array('name' => "Paprikapulver (geräuchert, mild)"));
        $ingredientPaprikapulverGer = \App\Ingredient::create(array('name' => "Paprikapulver (geräuchert)"));
        $ingredientMeersalz         = \App\Ingredient::create(array('name' => "Meersalz"));
        $ingredientPfeffer          = \App\Ingredient::create(array('name' => "Pfeffer"));
        $ingredientKreuzkuemmel     = \App\Ingredient::create(array('name' => "Kreuzkümmel (gemahlen)"));
        $ingredientKnoblauch        = \App\Ingredient::create(array('name' => "Knoblauch (getrocknet)"));
        $ingredientCayennepfeffer   = \App\Ingredient::create(array('name' => "Cayennepfeffer (gemahlen)"));
        $ingredientErdaepfel        = \App\Ingredient::create(array('name' => "Erdäpfel (mehlig)"));
        $ingredientMehl             = \App\Ingredient::create(array('name' => "Mehl (griffig)"));
        $ingredientWeizengriess     = \App\Ingredient::create(array('name' => "Weizengrieß"));
        $ingredientEidotter         = \App\Ingredient::create(array('name' => "Eidotter"));
        $ingredientSalz             = \App\Ingredient::create(array('name' => "Salz"));
        $ingredientMuskatnuss       = \App\Ingredient::create(array('name' => "Muskatnuss (gerieben)"));
        $ingredientKnoblauchzehe    = \App\Ingredient::create(array('name' => "Knoblauchzehe"));
        $ingredientApfelessig       = \App\Ingredient::create(array('name' => "Apfelessig"));
        $ingredientApfelsaft        = \App\Ingredient::create(array('name' => "Apfelsaft"));
        $ingredientTomatenketchup   = \App\Ingredient::create(array('name' => "Tomatenketchup"));
        $ingredientSojasauce        = \App\Ingredient::create(array('name' => "Sojasauce"));
        $ingredientWorcestersauce   = \App\Ingredient::create(array('name' => "Worcestersauce"));
        $ingredientAhornsirup       = \App\Ingredient::create(array('name' => "Ahornsirup"));
        $ingredientWhiskey          = \App\Ingredient::create(array('name' => "Whiskey"));

    }
}
