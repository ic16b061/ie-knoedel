<?php

namespace App\Http\Controllers;

use App\Ingredient;
use App\Recipe;
use App\RecipeIngredient;
use Illuminate\Http\Request;
use Image;
use Input;


class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('rezepte')
            // give us all the recipes
            ->with('recipes', Recipe::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rezept_erstellen');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd(request()->all());
        $badchars = array('-', '*', ' ');

        $recipe = new Recipe;
        $recipe->title = request('title');
        $recipe->category = request('category');
        $recipe->description = request('description');
        $recipe->ingredient_count = request('ingredient_count');

        if ($request->has('image')) {
            $upload = request('image');
            $destinationPath = public_path('img');
            $filename = request('title');
            $extension = Input::file('image')->getClientOriginalExtension();
            $file = str_replace($badchars, '_', mb_strtolower($filename.'.'.$extension));

            $imageResize = Image::make($upload->getRealPath())
                ->resize(1200,1200,function($c){$c->aspectRatio(); $c->upsize();})
                ->save($destinationPath.'/'.$file);

            $recipe->image = $file;
        }

        $recipe->save();

        $ingredient_index = request('ingredient_index');
        for ($count = 1; $count <= $ingredient_index; $count++) {
            if ($request->has('ingredient' . $count)) {
                if (!Ingredient::where('name', '=' , request('ingredient' . $count))->exists()) {
                    $ingredient = new Ingredient;
                    $ingredient->name = request('ingredient' . $count);
                    $ingredient->save();
                }

                $pivot = new RecipeIngredient;
                $pivot->recipe_id = $recipe->id;
                $pivot->ingredient_name = request('ingredient' . $count);

                if ($request->has('measurement' . $count)) {
                    $pivot->measurement = request('measurement' . $count);
                }

                if ($request->has('quantity' . $count)) {
                    $pivot->quantity = request('quantity' . $count);
                }

                $pivot->save();
            }
        }

        return redirect('/rezepte');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('rezept')
            ->with('recipe', Recipe::find($id))
            ->with('ingredients', RecipeIngredient::where('recipe_id', $id)->get());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('rezept_bearbeiten')
            ->with('recipe', Recipe::find($id))
            ->with('ingredients', RecipeIngredient::where('recipe_id', $id)->get());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd(request()->all());
        $badchars = array('-', '*', ' ');

        $recipe = Recipe::find($id);
        $recipe->title = request('title');
        $recipe->category = request('category');
        $recipe->description = request('description');
        $recipe->ingredient_count = request('ingredient_count');

        if ($request->has('image')) {
            $upload = request('image');
            $destinationPath = public_path('img');
            $filename = request('title');
            $extension = Input::file('image')->getClientOriginalExtension();
            $file = str_replace($badchars, '_', mb_strtolower($filename.'.'.$extension));

            $imageResize = Image::make($upload->getRealPath())
                ->resize(1200,1200,function($c){$c->aspectRatio(); $c->upsize();})
                ->save($destinationPath.'/'.$file);

            $recipe->image = $file;
        }

        $recipe->save();

        // Add new ingredients to ingredients table and recipe<->ingredient combination to recipe_ingredients table
        $ingredient_index = request('ingredient_index'); // index of last possible ingredient number

        // get ids of current data in recipe_ingredients
        $current_data = RecipeIngredient::select('id')->where('recipe_id', '=', $id)->get();
        $old_ids = array();
        foreach ($current_data as $key=>$current_result) {
            $old_ids[$key] = $current_result->id;
        }

        // array for data which should be kept in recipe_ingredients
        $new_ids = array();

        for ($count = 1; $count <= $ingredient_index; $count++) {
            $match = ['recipe_id' => $id, 'ingredient_name' => request('ingredient' . $count)];

            if ($request->has('ingredient' . $count)) {
                if (!Ingredient::where('name', '=' , request('ingredient' . $count))->exists()) {
                    $ingredient = new Ingredient;
                    $ingredient->name = request('ingredient' . $count);
                    $ingredient->save();
                }

                if (!RecipeIngredient::where($match)->exists()) {
                    $pivot = new RecipeIngredient;
                    $pivot->recipe_id = $recipe->id;
                    $pivot->ingredient_name = request('ingredient' . $count);

                    if ($request->has('measurement' . $count)) {
                        $pivot->measurement = request('measurement' . $count);
                    }

                    if ($request->has('quantity' . $count)) {
                        $pivot->quantity = request('quantity' . $count);
                    }

                    $pivot->save();
                }
            }

            // save id of recipe<->ingredient combination in array
            $results = RecipeIngredient::select('id')->where($match)->get();
            foreach ($results as $key=>$result) {
                $new_ids[$count - 1] = $result->id;
            }
        }

        // find and delete recipe<->ingredient combinations which were deleted on edit form
        foreach ($old_ids as $old_id) {
            if (!in_array($old_id, $new_ids)) {
                RecipeIngredient::find($old_id)->delete();
            }
        }

        return redirect('/rezepte/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Display a listing of the resource with top rating.
     *
     * @return \Illuminate\Http\Response
     */
    public function top() {
        return view('rezepte_top')->with('recipes', Recipe::orderBy('rating', 'DESC')->take(3)->get());
    }

    /**
     * Update the rating of a recipe.
     *
     * @return \Illuminate\Http\Response
     */
    public function rate(Request $request) {
        //dd($request->all());

        $id = request('id');
        $recipe = Recipe::find($id);

        // calculate new rating
        $current_rating = $recipe->rating;
        $current_rating_count = $recipe->rating_count;
        $new_rating_count = $current_rating_count + 1;
        $new_rating = (($current_rating * $current_rating_count) + request('rating')) / $new_rating_count;

        // save new values to database
        $recipe->rating_count = $new_rating_count;
        $recipe->rating = $new_rating;

        $recipe->save();

        return response()->json(['Vielen Dank für Ihre Abstimmung!']);
    }
}
