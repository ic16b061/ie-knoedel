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
        /*
        \App\Recipe::query()->delete();

        (new Faker\Generator)->seed(21);

        factory(App\Recipe::class, 15)->create();
        */

        $badchars = array('-', '*', ' ');

        $recipeErdaepfelKnoedelMitPulledPork = \App\Recipe::create(array(
            'title' =>  'Erdäpfelknödel mit Pulled Pork',
            'image' => str_replace($badchars, '_', mb_strtolower('Erdäpfelknödel mit Pulled Pork.jpg')),
            'description'   =>
                "Für die Erdäpfelknödel mit Pulled-Pork-Füllung zunächst für das Pulled Pork die trockenen Zutaten (außer dem Zucker) sowie den Senf für die Marinade vermischen und kräftig in das Schweinefleisch einmassieren. In einen Gefrierbeutel oder in doppelt gelegte Klarsichtfolie wickeln und im Kühlschrank für 24 Stunden marinieren.
                Fleisch etwa eine Stunde vor der Zubereitung aus dem Kühlschrank nehmen. Backrohr auf 110 °C Ober/Unterhitze vorheizen. Fleisch auf ein Gitter legen und mit einem Bratenthermometer versehen. Orangensaft, Gemüsefond und Zucker in eine Auflaufform geben und unter dem Gitter mit dem Fleisch im Backrohr platzieren. Ab einer Kerntemperatur von ca. 65 °C (nach ca. nach 3 Stunden) das Fleisch alle 30-40 Minuten mit dem Sud in der Form unter dem Schweinerücken bepinseln. Wenn die Kerntemperatur 85-88 °C erreicht hat, das Backrohr ausschalten und das Fleisch herausnehmen. In Alufolie einwickeln, zurück in das Backrohr geben und für ca. eine Stunde rasten lassen.
                In der Zwischenzeit für den Teig Erdäpfel in der Schale weich kochen. Schälen und noch heiß passieren. Mit den restlichen Zutaten auf einer bemehlten Arbeitsfläche rasch verkneten. Teig zu einer Rolle formen und ca. 30 Minuten zugedeckt bei Zimmertemperatur rasten lassen.
                Für die BBQ-Sauce Knoblauch fein hacken, mit den restlichen Zutaten (außer Paprikapulver und Alkohol) vermischen, aufkochen und für ca. 25 Minuten köcheln lassen. Danach mit den restlichen Zutaten abschmecken und zur Seite stellen.
                Das Fleisch auspacken, auf ein Brett legen und mit zwei Gabeln auseinanderzupfen. Mit dem Saft aus der Tropftasse und ca. 2/3 der BBQ-Sauce marinieren. Das Pulled Pork sollte nicht in der Sauce schwimmen, aber saftig sein.
                Teig auf ca. 1 1/2 cm Dicke ausrollen und mit einem Ausstecher Kreise ausstechen. Etwas von dem Pulled Pork in der Mitte platzieren, Enden zusammenfalten, gut verschließen und zu Knödel formen. Im Salzwasser für ca. 10-12 Minuten köcheln lassen. Knödel aus dem Wasser heben und gut abtropfen lassen.
                Etwas von dem restlichen Pulled Pork auf einem Teller platzieren, Knödel darauf setzen und die Erdäpfelknödel mit Pulled-Pork-Füllung servieren.
                Tipp: Natürlich können Sie auch mehr Erdäpfelteig machen, damit mehr Erdäpfelknödel mit Pulled-Pork-Füllung und kein Pulled Pork zum Dazuessen übrig bleibt.",
            'category' =>   'sauer',
            'rating' => 5
        ));

        $recipeErdaepfelKnoedelMitPulledPork->ingredients()->attach("Schweinerücken",   [ 'quantity' => "1000" ,    'measurement' => "g"]);
        $recipeErdaepfelKnoedelMitPulledPork->ingredients()->attach("Orangensaft",      [ 'quantity' => "250" ,     'measurement' => "ml"]);
        $recipeErdaepfelKnoedelMitPulledPork->ingredients()->attach("Gemüsefond",       [ 'quantity' => "250" ,     'measurement' => "ml"]);
        $recipeErdaepfelKnoedelMitPulledPork->ingredients()->attach("Vollrohrzucker",   [ 'quantity' => "3" ,       'measurement' => "EL"]);
        $recipeErdaepfelKnoedelMitPulledPork->ingredients()->attach("Estragonsenf",     [ 'quantity' => "1.5" ,     'measurement' => "EL"]);
        $recipeErdaepfelKnoedelMitPulledPork->ingredients()->attach("Meersalz",         [ 'quantity' => "1" ,       'measurement' => "TL"]);
        $recipeErdaepfelKnoedelMitPulledPork->ingredients()->attach("Pfeffer",          [ 'quantity' => "1" ,       'measurement' => "TL"]);
        $recipeErdaepfelKnoedelMitPulledPork->ingredients()->attach("Erdäpfel (mehlig)",[ 'quantity' => "300" ,     'measurement' => "g"]);
        $recipeErdaepfelKnoedelMitPulledPork->ingredients()->attach("Mehl (griffig)",   [ 'quantity' => "100" ,     'measurement' => "g"]);
        $recipeErdaepfelKnoedelMitPulledPork->ingredients()->attach("Weizengrieß",      [ 'quantity' => "30" ,      'measurement' => "g"]);
        $recipeErdaepfelKnoedelMitPulledPork->ingredients()->attach("Eidotter",         [ 'quantity' => "2" ,       'measurement' => "Stk"]);
        $recipeErdaepfelKnoedelMitPulledPork->ingredients()->attach("Salz",             [ 'quantity' => "1" ,       'measurement' => "Briese"]);
        $recipeErdaepfelKnoedelMitPulledPork->ingredients()->attach("Knoblauchzehe",    [ 'quantity' => "1" ,       'measurement' => "Stk"]);
        $recipeErdaepfelKnoedelMitPulledPork->ingredients()->attach("Apfelessig",       [ 'quantity' => "50" ,      'measurement' => "ml"]);
        $recipeErdaepfelKnoedelMitPulledPork->ingredients()->attach("Apfelsaft",        [ 'quantity' => "200" ,     'measurement' => "ml"]);
        $recipeErdaepfelKnoedelMitPulledPork->ingredients()->attach("Tomatenketchup",   [ 'quantity' => "200" ,     'measurement' => "g"]);
        $recipeErdaepfelKnoedelMitPulledPork->ingredients()->attach("Sojasauce",        [ 'quantity' => "1" ,       'measurement' => "EL"]);
        $recipeErdaepfelKnoedelMitPulledPork->ingredients()->attach("Worcestersauce",   [ 'quantity' => "1" ,       'measurement' => "TL"]);
        $recipeErdaepfelKnoedelMitPulledPork->ingredients()->attach("Ahornsirup",       [ 'quantity' => "4" ,       'measurement' => "EL"]);
        $recipeErdaepfelKnoedelMitPulledPork->ingredients()->attach("Whiskey",          [ 'quantity' => "1" ,       'measurement' => "Schluck"]);
        $recipeErdaepfelKnoedelMitPulledPork->ingredients()->attach("Muskatnuss (gerieben)",            [ 'quantity' => "1" ,   'measurement' => "Briese"]);
        $recipeErdaepfelKnoedelMitPulledPork->ingredients()->attach("Kreuzkümmel (gemahlen)",           [ 'quantity' => "1" ,   'measurement' => "TL"]);
        $recipeErdaepfelKnoedelMitPulledPork->ingredients()->attach("Knoblauch (getrocknet)",           [ 'quantity' => "1" ,   'measurement' => "TL"]);
        $recipeErdaepfelKnoedelMitPulledPork->ingredients()->attach("Cayennepfeffer (gemahlen)",        [ 'quantity' => "1" ,   'measurement' => "TL"]);
        $recipeErdaepfelKnoedelMitPulledPork->ingredients()->attach("Paprikapulver (geräuchert)",       [ 'quantity' => "0.5" , 'measurement' => "TL"]);
        $recipeErdaepfelKnoedelMitPulledPork->ingredients()->attach("Paprikapulver (geräuchert, mild)", [ 'quantity' => "1" ,   'measurement' => "TL"]);
    }
}
