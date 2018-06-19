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
        $ingredientErdaepfelmehl        = \App\Ingredient::create(array('name' => "Erdäpfel (mehlig)"));
        $ingredientErdaepfel        = \App\Ingredient::create(array('name' => "Erdäpfel"));
        $ingredientMehlgrif             = \App\Ingredient::create(array('name' => "Mehl (griffig)"));
        $ingredientMehlglatt          = \App\Ingredient::create(array('name' => "Mehl (glatt)"));
        $ingredientMehl             = \App\Ingredient::create(array('name' => "Mehl"));
        $ingredientWeizengriess     = \App\Ingredient::create(array('name' => "Weizengrieß"));
        $ingredientEidotter         = \App\Ingredient::create(array('name' => "Eidotter"));
        $ingredientEi         = \App\Ingredient::create(array('name' => "Ei"));
        $ingredientSalz             = \App\Ingredient::create(array('name' => "Salz"));
        $ingredientMuskatnussger       = \App\Ingredient::create(array('name' => "Muskatnuss (gerieben)"));
        $ingredientKnoblauchzehe    = \App\Ingredient::create(array('name' => "Knoblauchzehe"));
        $ingredientApfelessig       = \App\Ingredient::create(array('name' => "Apfelessig"));
        $ingredientApfelsaft        = \App\Ingredient::create(array('name' => "Apfelsaft"));
        $ingredientTomatenketchup   = \App\Ingredient::create(array('name' => "Tomatenketchup"));
        $ingredientSojasauce        = \App\Ingredient::create(array('name' => "Sojasauce"));
        $ingredientWorcestersauce   = \App\Ingredient::create(array('name' => "Worcestersauce"));
        $ingredientAhornsirup       = \App\Ingredient::create(array('name' => "Ahornsirup"));
        $ingredientWhiskey          = \App\Ingredient::create(array('name' => "Whiskey"));
        $ingredientMarillen         = \App\Ingredient::create(array('name' => "Marillen"));
        $ingredientZuckerwuerfel    = \App\Ingredient::create(array('name' => "Zuckerwürfel"));
        $ingredientZucker           = \App\Ingredient::create(array('name' => "Zucker"));
        $ingredientButter           = \App\Ingredient::create(array('name' => "Butter"));
    $ingredientSemmelbroesel        = \App\Ingredient::create(array('name' => "Semmelbrösel"));
        $ingredientZimt             = \App\Ingredient::create(array('name' => "Zimt"));
        $ingredientKristallzucker         = \App\Ingredient::create(array('name' => "Kristallzucker"));
        $ingredientStaubzucker         = \App\Ingredient::create(array('name' => "Staubzucker"));
        $ingredientButterzerl          = \App\Ingredient::create(array('name' => "Butter (zerlassen)"));
        $ingredientGries          = \App\Ingredient::create(array('name' => "Gries"));
        $ingredientMilch         = \App\Ingredient::create(array('name' => "Milch"));
        $ingredientGerm         = \App\Ingredient::create(array('name' => "Germ"));
        $ingredientPowidl          = \App\Ingredient::create(array('name' => "Powidl"));
        $ingredientGraumohngeri         = \App\Ingredient::create(array('name' => "Graumohn (gerieben)"));
        $ingredientMagertopfen         = \App\Ingredient::create(array('name' => "Magertopfen"));
        $ingredientSchlagobers        = \App\Ingredient::create(array('name' => "Schlagobers"));
        $ingredientPreiselbeermarmelade        = \App\Ingredient::create(array('name' => "Preiselbeermarmelade"));
        $ingredientSemmelwürfel       = \App\Ingredient::create(array('name' => "Semmelwürfel"));
        $ingredientRotkraut       = \App\Ingredient::create(array('name' => "Rotkraut"));
        $ingredientSelchfleisch        = \App\Ingredient::create(array('name' => "Selchfleisch"));
        $ingredientKartoffel        = \App\Ingredient::create(array('name' => "Kartoffel"));
        $ingredientKartoffel        = \App\Ingredient::create(array('name' => "Zwiebel"));
        $ingredientMajoran        = \App\Ingredient::create(array('name' => "Majoran"));
        $ingredienSemmelknoedel       = \App\Ingredient::create(array('name' => "Semmelknödel"));
        $ingredienSemmel      = \App\Ingredient::create(array('name' => "Semmel"));
        $ingredienKraeuterfrisch       = \App\Ingredient::create(array('name' => "Kräuter (frisch)"));


    }
}
