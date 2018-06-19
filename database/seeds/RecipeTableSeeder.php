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
            'title' => 'Erdäpfelknödel mit Pulled Pork',
            'image' => str_replace($badchars, '_', mb_strtolower('Erdäpfelknödel mit Pulled Pork.jpg')),
            'description' =>
"Für die Erdäpfelknödel mit Pulled-Pork-Füllung zunächst für das Pulled Pork die trockenen Zutaten (außer dem Zucker) sowie den Senf für die Marinade vermischen und kräftig in das Schweinefleisch einmassieren. In einen Gefrierbeutel oder in doppelt gelegte Klarsichtfolie wickeln und im Kühlschrank für 24 Stunden marinieren.
Fleisch etwa eine Stunde vor der Zubereitung aus dem Kühlschrank nehmen. Backrohr auf 110 °C Ober/Unterhitze vorheizen. Fleisch auf ein Gitter legen und mit einem Bratenthermometer versehen. Orangensaft, Gemüsefond und Zucker in eine Auflaufform geben und unter dem Gitter mit dem Fleisch im Backrohr platzieren. Ab einer Kerntemperatur von ca. 65 °C (nach ca. nach 3 Stunden) das Fleisch alle 30-40 Minuten mit dem Sud in der Form unter dem Schweinerücken bepinseln. Wenn die Kerntemperatur 85-88 °C erreicht hat, das Backrohr ausschalten und das Fleisch herausnehmen. In Alufolie einwickeln, zurück in das Backrohr geben und für ca. eine Stunde rasten lassen.
In der Zwischenzeit für den Teig Erdäpfel in der Schale weich kochen. Schälen und noch heiß passieren. Mit den restlichen Zutaten auf einer bemehten Arbeitsfläche rasch verkneten. Teig zu einer Rolle formen und ca. 30 Minuten zugedeckt bei Zimmertemperatur rasten lassen.
Für die BBQ-Sauce Knoblauch fein hacken, mit den restlichen Zutaten (außer Paprikapulver und Alkohol) vermischen, aufkochen und für ca. 25 Minuten köcheln lassen. Danach mit den restlichen Zutaten abschmecken und zur Seite stellen.
Das Fleisch auspacken, auf ein Brett legen und mit zwei Gabeln auseinanderzupfen. Mit dem Saft aus der Tropftasse und ca. 2/3 der BBQ-Sauce marinieren. Das Pulled Pork sollte nicht in der Sauce schwimmen, aber saftig sein.
Teig auf ca. 1 1/2 cm Dicke ausrollen und mit einem Ausstecher Kreise ausstechen. Etwas von dem Pulled Pork in der Mitte platzieren, Enden zusammenfalten, gut verschließen und zu Knödel formen. Im Salzwasser für ca. 10-12 Minuten köcheln lassen. Knödel aus dem Wasser heben und gut abtropfen lassen.
Etwas von dem restlichen Pulled Pork auf einem Teller platzieren, Knödel darauf setzen und die Erdäpfelknödel mit Pulled-Pork-Füllung servieren.
Tipp: Natürlich können Sie auch mehr Erdäpfelteig machen, damit mehr Erdäpfelknödel mit Pulled-Pork-Füllung und kein Pulled Pork zum Dazuessen übrig bleibt.",
            'category' => 'Sauer',
            'rating' => 4.1,
            'rating_count' => 13,
            'ingredient_count' => 26
        ));

        $recipeErdaepfelKnoedelMitPulledPork->ingredients()->attach("Schweinerücken", ['quantity' => "1000", 'measurement' => "g"]);
        $recipeErdaepfelKnoedelMitPulledPork->ingredients()->attach("Orangensaft", ['quantity' => "250", 'measurement' => "ml"]);
        $recipeErdaepfelKnoedelMitPulledPork->ingredients()->attach("Gemüsefond", ['quantity' => "250", 'measurement' => "ml"]);
        $recipeErdaepfelKnoedelMitPulledPork->ingredients()->attach("Vollrohrzucker", ['quantity' => "3", 'measurement' => "EL"]);
        $recipeErdaepfelKnoedelMitPulledPork->ingredients()->attach("Estragonsenf", ['quantity' => "1.5", 'measurement' => "EL"]);
        $recipeErdaepfelKnoedelMitPulledPork->ingredients()->attach("Meersalz", ['quantity' => "1", 'measurement' => "TL"]);
        $recipeErdaepfelKnoedelMitPulledPork->ingredients()->attach("Pfeffer", ['quantity' => "1", 'measurement' => "TL"]);
        $recipeErdaepfelKnoedelMitPulledPork->ingredients()->attach("Erdäpfel (mehlig)", ['quantity' => "300", 'measurement' => "g"]);
        $recipeErdaepfelKnoedelMitPulledPork->ingredients()->attach("Mehl (griffig)", ['quantity' => "100", 'measurement' => "g"]);
        $recipeErdaepfelKnoedelMitPulledPork->ingredients()->attach("Weizengrieß", ['quantity' => "30", 'measurement' => "g"]);
        $recipeErdaepfelKnoedelMitPulledPork->ingredients()->attach("Eidotter", ['quantity' => "2", 'measurement' => "Stk"]);
        $recipeErdaepfelKnoedelMitPulledPork->ingredients()->attach("Salz", ['quantity' => "1", 'measurement' => "Prise"]);
        $recipeErdaepfelKnoedelMitPulledPork->ingredients()->attach("Knoblauchzehe", ['quantity' => "1", 'measurement' => "Stk"]);
        $recipeErdaepfelKnoedelMitPulledPork->ingredients()->attach("Apfelessig", ['quantity' => "50", 'measurement' => "ml"]);
        $recipeErdaepfelKnoedelMitPulledPork->ingredients()->attach("Apfelsaft", ['quantity' => "200", 'measurement' => "ml"]);
        $recipeErdaepfelKnoedelMitPulledPork->ingredients()->attach("Tomatenketchup", ['quantity' => "200", 'measurement' => "g"]);
        $recipeErdaepfelKnoedelMitPulledPork->ingredients()->attach("Sojasauce", ['quantity' => "1", 'measurement' => "EL"]);
        $recipeErdaepfelKnoedelMitPulledPork->ingredients()->attach("Worcestersauce", ['quantity' => "1", 'measurement' => "TL"]);
        $recipeErdaepfelKnoedelMitPulledPork->ingredients()->attach("Ahornsirup", ['quantity' => "4", 'measurement' => "EL"]);
        $recipeErdaepfelKnoedelMitPulledPork->ingredients()->attach("Whiskey", ['quantity' => "1", 'measurement' => "Schluck"]);
        $recipeErdaepfelKnoedelMitPulledPork->ingredients()->attach("Muskatnuss (gerieben)", ['quantity' => "1", 'measurement' => "Prise"]);
        $recipeErdaepfelKnoedelMitPulledPork->ingredients()->attach("Kreuzkümmel (gemahlen)", ['quantity' => "1", 'measurement' => "TL"]);
        $recipeErdaepfelKnoedelMitPulledPork->ingredients()->attach("Knoblauch (getrocknet)", ['quantity' => "1", 'measurement' => "TL"]);
        $recipeErdaepfelKnoedelMitPulledPork->ingredients()->attach("Cayennepfeffer (gemahlen)", ['quantity' => "1", 'measurement' => "TL"]);
        $recipeErdaepfelKnoedelMitPulledPork->ingredients()->attach("Paprikapulver (geräuchert)", ['quantity' => "0.5", 'measurement' => "TL"]);
        $recipeErdaepfelKnoedelMitPulledPork->ingredients()->attach("Paprikapulver (geräuchert, mild)", ['quantity' => "1", 'measurement' => "TL"]);

        $recipeGermknoedel = \App\Recipe::create(array(
            'title' => 'Germknödel',
            'image' => str_replace($badchars, '_', mb_strtolower('germknoedel.jpg')),
            'description' =>
"Für den Germknödel die Germ in der lauwarmen Milch auflösen, 4 EL Mehl, Kristallzucker und eine Prise Salz zugeben. Verrühren, mit etwas Mehl bestauben und zugedeckt an einem warmen Ort gehen lassen, bis sich das Volumen verdoppelt hat (am besten im Backrohr bei 40 °C und geöffneter Türe). 
Geschmolzene Butter, restliches Mehl, Ei und Eidotter einmengen und zu einem glatten Teig verarbeiten. Zugedeckt weitere 30-40 Minuten aufgehen lassen. 
Teig auf einer bemehlten Arbeitsfläche zusammenschlagen, 5 Minuten rasten lassen und 5 mm dick ausrollen. Mit dem Teigrad in etwa 5 x 5 cm große Quadrate schneiden. Ränder mit Wasser befeuchten. Jeweils etwas Powidl in der Mitte der Quadrate auftragen, Teig übereinander schlagen und zu Knödeln formen. 
Auf ein mit Mehl bestreutes Brett legen und zugedeckt nochmals 30 Minuten gehen lassen. 
In einem großen, geräumigen Topf (die Germknödel brauchen viel Platz zum Aufgehen) Salzwasser aufkochen und Knödel einlegen (wenn nötig, in 2 Tranchen). Einmal kräftig aufkochen lassen und dann bei fest geschlossenem Deckel 15 Minuten ziehen lassen. 
Dabei die Germknödel nach etwa 10 Minuten umdrehen und weitere 4-5 Minuten zugedeckt fertig kochen. Herausheben und sofort mit einer dicken Nadel oder einem Zahnstocher einige Male anstechen, um das Zusammenfallen der Knödel zu verhindern. 
Für die Mohnmischung für die Germknödel Mohn mit Staubzucker vermischen und über die Knödel streuen. Ausreichend mit flüssiger Butter beträufeln und rasch servieren.

Tipp
Achten Sie darauf, dass alle verwendeten Zutaten Zimmertemperatur haben, da sonst der Germteig nicht richtig aufgehen kann.
Germknödel schmecken auch mit Vanillesauce köstlich.",
            'category' => 'Süß',
            'rating' => 3,
            'rating_count' => 4,
            'ingredient_count' => 12
        ));
        $recipeGermknoedel->ingredients()->attach("Milch", ['quantity' => "120", 'measurement' => "ml"]);
        $recipeGermknoedel->ingredients()->attach("Germ", ['quantity' => "12", 'measurement' => "g"]);
        $recipeGermknoedel->ingredients()->attach("Mehl (glatt)", ['quantity' => "250", 'measurement' => "g"]);
        $recipeGermknoedel->ingredients()->attach("Butter (zerlassen)", ['quantity' => "3", 'measurement' => "EL"]);
        $recipeGermknoedel->ingredients()->attach("Ei", ['quantity' => "1", 'measurement' => "Stk"]);
        $recipeGermknoedel->ingredients()->attach("Eidotter", ['quantity' => "1", 'measurement' => "Stk"]);
        $recipeGermknoedel->ingredients()->attach("Salz", ['quantity' => "1", 'measurement' => "Prise"]);
        $recipeGermknoedel->ingredients()->attach("Kristallzucker", ['quantity' => "1", 'measurement' => "EL"]);
        $recipeGermknoedel->ingredients()->attach("Powidl", ['quantity' => "120", 'measurement' => "g"]);
        $recipeGermknoedel->ingredients()->attach("Staubzucker", ['quantity' => "100", 'measurement' => "g"]);
        $recipeGermknoedel->ingredients()->attach("Graumohn (gerieben)", ['quantity' => "100", 'measurement' => "g"]);
        $recipeGermknoedel->ingredients()->attach("Butter (zerlassen)", ['quantity' => "200", 'measurement' => "g"]);


        $recipeMarillenknoedel = \App\Recipe::create(array(
            'title' => 'Marillenknödel',
            'image' => str_replace($badchars, '_', mb_strtolower('marillenknoedel.jpg')),
            'description' =>
"Für die Marillenknödel zunächst die Erdäpfel weich kochen, schälen und noch heiß durch die Erdäpfelpresse drücken. Mit Butter, Mehl, Dottern, Grieß und Salz zu einem Teig vermischen. Je nach Feuchtigkeit der Erdäpfeln benötigt man vielleicht ein bisschen mehr Mehl.
Teig 10 Minuten rasten lassen.
Den Teig auf einer bemehlten Fläche zu einer Rolle formen und in 20 Scheibchen schneiden. Teigscheiben eben drücken, jeweils eine Marille daraufsetzen und mit Teig bedecken. (Wer keine Marillenkerne in den fertigen Knödel haben möchte, kann diese mit einem Kochlöffelstiel aus den Marillen drücken und die Marillen stattdessen mit Würfelzucker befüllen.)
Knödel in leicht gesalzenem Wasser 10 bis 12 Minuten ziehen lassen (nicht kochen!).
In der Zwischenzeit für die Butterbrösel Butter erhitzen, Brösel, Zimt und Kristallzucker dazugeben und unter ständigem Rühren goldgelb rösten.
Knödel mit einem Siebschöpfer aus dem Wasser heben, gut abtropfen lassen und in den Butterbröseln wälzen. Die Marillenknödel mit Staubzucker bestreut servieren.

Tipp
Die Butterbrösel für die Marillenknödel können noch mit geriebenen Nüssen verfeinert werden.",
            'category' => 'Süß',
            'rating' => 3.2,
            'rating_count' => 19,
            'ingredient_count' => 13
        ));
        $recipeMarillenknoedel->ingredients()->attach("Marillen", ['quantity' => "20", 'measurement' => "Stk"]);
        $recipeMarillenknoedel->ingredients()->attach("Zuckerwürfel", ['quantity' => "20", 'measurement' => "Stk"]);
        $recipeMarillenknoedel->ingredients()->attach("Butter", ['quantity' => "100", 'measurement' => "g"]);
        $recipeMarillenknoedel->ingredients()->attach("Semmelbrösel", ['quantity' => "120", 'measurement' => "g"]);
        $recipeMarillenknoedel->ingredients()->attach("Zimt", ['quantity' => "1", 'measurement' => "Prise"]);
        $recipeMarillenknoedel->ingredients()->attach("Kristallzucker", ['quantity' => "50", 'measurement' => "g"]);
        $recipeMarillenknoedel->ingredients()->attach("Staubzucker", ['quantity' => "1", 'measurement' => "Stk"]);
        $recipeMarillenknoedel->ingredients()->attach("Erdäpfel", ['quantity' => "750", 'measurement' => "g"]);
        $recipeMarillenknoedel->ingredients()->attach("Butter (zerlassen)", ['quantity' => "50", 'measurement' => "g"]);
        $recipeMarillenknoedel->ingredients()->attach("Mehl", ['quantity' => "220", 'measurement' => "g"]);
        $recipeMarillenknoedel->ingredients()->attach("Gries", ['quantity' => "50", 'measurement' => "g"]);
        $recipeMarillenknoedel->ingredients()->attach("Eidotter", ['quantity' => "2", 'measurement' => "Stk"]);
        $recipeMarillenknoedel->ingredients()->attach("Salz", ['quantity' => "1", 'measurement' => "Prise"]);

        $recipeTopfenknoedelMitPreislbeerschaum = \App\Recipe::create(array(
            'title' => 'Topfenknödel mit Preislbeerschaum',
            'image' => str_replace($badchars, '_', mb_strtolower('topfenknoedel_mit_preislbeerschaum.jpg')),
            'description' =>
"Für die Topfenknödel mit Preislbeerschaum das Ei trennen und das Eiweiß steif schlagen.
Topfen, Brösel, Grieß und Eigelb vermengen, Eischnee vorsichtig untermischen und die Masse im Kühlschrank kalt stellen. Anschließend ca. 10 Minuten im köchelnden Wasser ziehen lassen.
Brösel in Butter braun werden lassen und die Knödel darin wälzen. Für den Preiselbeerschaum das Schlagobers steif schlagen, Marmelade fein pürieren und unter das Obers heben.
Die Topfenknödel mit Preislbeerschaum servieren.

Tipp

Die Topfenknödel mit Preislbeerschaum sind nicht nur ein herrliches Dessert, sondern schmecken auch als Hauptspeise hervorragend.",
            'category' => 'Süß',
            'rating' => 4,
            'rating_count' => 42,
            'ingredient_count' => 7
        ));
        $recipeTopfenknoedelMitPreislbeerschaum->ingredients()->attach("Magertopfen", ['quantity' => "250", 'measurement' => "g"]);
        $recipeTopfenknoedelMitPreislbeerschaum->ingredients()->attach("Semmelbrösel", ['quantity' => "3", 'measurement' => "EL"]);
        $recipeTopfenknoedelMitPreislbeerschaum->ingredients()->attach("Weizengrieß", ['quantity' => "6", 'measurement' => "EL"]);
        $recipeTopfenknoedelMitPreislbeerschaum->ingredients()->attach("Ei", ['quantity' => "1", 'measurement' => "Stk"]);
        $recipeTopfenknoedelMitPreislbeerschaum->ingredients()->attach("Butter", ['quantity' => "1", 'measurement' => "Stk"]);
        $recipeTopfenknoedelMitPreislbeerschaum->ingredients()->attach("Schlagobers", ['quantity' => "250", 'measurement' => "ml"]);
        $recipeTopfenknoedelMitPreislbeerschaum->ingredients()->attach("Preiselbeermarmelade ", ['quantity' => "3", 'measurement' => "EL"]);


        $recipeErdaepfelknoedelMitRotkrautfuelle = \App\Recipe::create(array(
            'title' => 'Erdäpfelknödel mit Rotkrautfülle',
            'image' => str_replace($badchars, '_', mb_strtolower('erdaepfelknoedel_mit_rotkrautfuelle.jpg')),
            'description' =>
"Für die Erdäpfelknödel mit Rotkrautfülle zuerst das Rotkraut zubereiten und abkühlen lassen. Danach aus dem Rotkraut kleine Kugeln formen und diese Im Gefrierschrank fest werden lassen.
Für die Erdäpfelknödel mehlige Erdäpfel kochen, auskühlen lassen, schälen und mit dem Kartoffelstampfer zerdrücken oder mit einer Flotten Lotte passieren.
In die Erdäpfelmasse die Eier einrühren, das Mehl hinzufügen und mit Salz, Zucker und Muskat zügig einen Teig ankneten. Der Teig ist fertig, wenn er nicht mehr in der Schüssel kleben bleibt. Semmelwürfel (oder eine alte, in Würfel geschnittene Semmel) in etwas Öl in einer Pfanne anrösten. Danach in den Erdäpfelteig einmengen. Aus der Erdäpfelteigmasse gleich große Stücke trennen und diese zu Knödel formen. In die Mitte des Knödels jeweils ein Rotkrautkugerl drücken und den Knödel wieder schön rund mit Teig verschließen.
Salzwasser zum Kochen bringen, dieErdäpfelknödel einlegen, einmal aufkochen lassen und dann ca. 10 Minuten bei reduzierter Hitze ziehen lassen. Die Erdäpfelknödel mit Rotkrautfülle sind fertig, wenn sie an der Oberfläche schwimmen.

Tipp
Erdäpfelknödel mit Rotkrautfülle passen als Beilage wunderbar zu Wild oder Gans.",
            'category' => 'Sauer',
            'rating' => 4.8,
            'rating_count' => 28,
            'ingredient_count' => 8
        ));
        $recipeErdaepfelknoedelMitRotkrautfuelle->ingredients()->attach("Erdäpfel (mehlig)", ['quantity' => "1", 'measurement' => "kg"]);
        $recipeErdaepfelknoedelMitRotkrautfuelle->ingredients()->attach("Ei", ['quantity' => "3", 'measurement' => "Stk"]);
        $recipeErdaepfelknoedelMitRotkrautfuelle->ingredients()->attach("Mehl", ['quantity' => "3", 'measurement' => "EL"]);
        $recipeErdaepfelknoedelMitRotkrautfuelle->ingredients()->attach("Salz", ['quantity' => "1", 'measurement' => "Stk"]);
        $recipeErdaepfelknoedelMitRotkrautfuelle->ingredients()->attach("Zucker", ['quantity' => "1", 'measurement' => "Prise"]);
        $recipeErdaepfelknoedelMitRotkrautfuelle->ingredients()->attach("Muskatnuss (gerieben)", ['quantity' => "1", 'measurement' => "Prise"]);
        $recipeErdaepfelknoedelMitRotkrautfuelle->ingredients()->attach("Semmelwürfel", ['quantity' => "5", 'measurement' => "EL"]);
        $recipeErdaepfelknoedelMitRotkrautfuelle->ingredients()->attach("Rotkraut ", ['quantity' => "1", 'measurement' => "Stk"]);

        $recipeSelchfleischknoedel = \App\Recipe::create(array(
            'title' => 'Selchfleischknödel',
            'image' => str_replace($badchars, '_', mb_strtolower('Selchfleischknoedel.jpg')),
            'description' =>
"Für die Selchfleischknödel den Selchroller in heißem Wasser ca. 90 Minuten kochen lassen. Danach das Netz entfernen und auskühlen lassen.
Die Kartoffel kochen und etwas abkühlen lassen. Danach schälen und mit einem Kartoffelstampfer zerdrücken. Mehl und Salz dazu geben und zu einem Teig verkneten. Dabei etwas Wasser dazu leeren (ca. 50ml). Den Erdäpfelteig etwas rasten lassen.
Das Selchfleisch faschieren oder in möglichst kleine, feine Streifen schneiden. In einer Pfanne Butter zerlassen und Knoblauch und Zwiebeln darin anschwitzen. Danach das faschierte Selchfleisch dazu geben und ebenfalls mitrösten lassen. Etwas auskühlen lassen. Eier und Semmelbrösel beigeben und alles zu einer homogenen Masse vermengen. Mit Majoran, Salz und Pfeffer abschmecken.
Aus dem Kartoffelteig kleine Stücke abschneiden. Diese etwas ausrollen, mit einem Löffel die Selchfülle auftragen und den Teig rundherum zu einem Knödel formen.
In kochendes Wasser einlegen, einmal aufwallen lassen und die Selchfleischknödel dann ca. 10 Minuten köcheln lassen.

Tipp

Zum Selchfleischknödel Rezept passt hervorragend Rotkraut.",
            'category' => 'Sauer',
            'rating' => 3.6,
            'rating_count' => 13,
            'ingredient_count' => 11
        ));
        $recipeSelchfleischknoedel->ingredients()->attach("Selchfleisch ", ['quantity' => "250", 'measurement' => "g"]);
        $recipeSelchfleischknoedel->ingredients()->attach("Kartoffel ", ['quantity' => "130", 'measurement' => "g"]);
        $recipeSelchfleischknoedel->ingredients()->attach("Mehl (griffig) ", ['quantity' => "250", 'measurement' => "g"]);
        $recipeSelchfleischknoedel->ingredients()->attach("Salz", ['quantity' => "1", 'measurement' => "Priese"]);
        $recipeSelchfleischknoedel->ingredients()->attach("Butter", ['quantity' => "2", 'measurement' => "EL"]);
        $recipeSelchfleischknoedel->ingredients()->attach("Zwiebel", ['quantity' => "1", 'measurement' => "Stk"]);
        $recipeSelchfleischknoedel->ingredients()->attach("Knoblauchzehe", ['quantity' => "1.5", 'measurement' => "Stk"]);
        $recipeSelchfleischknoedel->ingredients()->attach("Semmelbrösel", ['quantity' => "2", 'measurement' => "Stk"]);
        $recipeSelchfleischknoedel->ingredients()->attach("Ei", ['quantity' => "250", 'measurement' => "g"]);
        $recipeSelchfleischknoedel->ingredients()->attach("Pfeffer", ['quantity' => "1", 'measurement' => "Priese"]);
        $recipeSelchfleischknoedel->ingredients()->attach("Majoran", ['quantity' => "1", 'measurement' => "Stk"]);

        $recipeSemmelknoedelMitEi = \App\Recipe::create(array(
            'title' => 'Semmelknödel mit Ei',
            'image' => str_replace($badchars, '_', mb_strtolower('semmelknoedel_mit_ei.jpg')),
            'description' =>
"Für Knödel mit Ei die fertigen Semmelknödel in gleichmäßig große Stücke schneiden. Die Eier aufschlagen und gut verquirlen.
Eine Pfanne erhitzen, Butter schmelzen lassen und die Knödelstücke darin anbraten. Die Eimasse darüber schlagen und stocken lassen. Gelegentlich umrühren.
Knödel mit Ei nach Belieben mit Salz und Pfeffer würzen und mit frischen, gehackten Kräutern Ihrer Wahl servieren.

Tipp

Das Knödel mit Ei Rezept ist ein tolles Restlessen.
Wer möchte kann auch noch geschnittenen Frühlingszwiebeln mit anbraten.",
            'category' => 'Sauer',
            'rating' => 4.9,
            'rating_count' => 53,
            'ingredient_count' => 6
        ));
        $recipeSemmelknoedelMitEi->ingredients()->attach("Semmelknödel", ['quantity' => "4", 'measurement' => "Stk"]);
        $recipeSemmelknoedelMitEi->ingredients()->attach("Butter", ['quantity' => "1", 'measurement' => "EL"]);
        $recipeSemmelknoedelMitEi->ingredients()->attach("Ei", ['quantity' => "4", 'measurement' => "Stk"]);
        $recipeSemmelknoedelMitEi->ingredients()->attach("Salz", ['quantity' => "1", 'measurement' => "Prise"]);
        $recipeSemmelknoedelMitEi->ingredients()->attach("Pfeffer", ['quantity' => "1", 'measurement' => "Prise"]);
        $recipeSemmelknoedelMitEi->ingredients()->attach("Kräuter (frisch)", ['quantity' => "1", 'measurement' => "Stk"]);

        $recipeServiettenknoedel = \App\Recipe::create(array(
            'title' => 'Serviettenknödel',
            'image' => str_replace($badchars, '_', mb_strtolower('serviettenknoedel.jpg')),
            'description' =>
"Für die Serviettenknödel die Semmeln in grobe Würfel schneiden. Die Milch erhitzen und die Weissbrotwürfel darin einweichen.
Die Eier trennen. Eidotter zum Brot geben, mit Salz, Pfeffer und Muskatnuss würzen und gut mischen. Eiklar steif aufschlagen und vorsichtig unter die Knödelmasse heben. Eine Rolle formen und mit einer hitzefesten Frischhaltefolie einwickeln, die Enden gut verschließen.
Die Serviettenknödel in kochendes Wasser geben. Die Garzeit beträgt 25-30 Minuten. Danach vorsichtig aus der Folie lösen und in Scheiben schneiden.
Die Serviettenknödel als Beilage heiß servieren.

Tipp

Serviettenknödel passen zu Braten und Wildgerichten.",
            'category' => 'Allgemein',
            'rating' => 2.6,
            'rating_count' => 41,
            'ingredient_count' => 5
        ));
        $recipeServiettenknoedel->ingredients()->attach("Semmel", ['quantity' => "200", 'measurement' => "g"]);
        $recipeServiettenknoedel->ingredients()->attach("Milch", ['quantity' => "150", 'measurement' => "ml"]);
        $recipeServiettenknoedel->ingredients()->attach("Ei", ['quantity' => "2", 'measurement' => "Stk"]);
        $recipeServiettenknoedel->ingredients()->attach("Muskatnuss (gerieben)", ['quantity' => "1", 'measurement' => "Prise"]);
        $recipeServiettenknoedel->ingredients()->attach("Salz", ['quantity' => "1", 'measurement' => "Prise"]);

    }
}
