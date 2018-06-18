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

        $recipe = new Recipe;
        $recipe->title = request('title');
        $recipe->category = request('category');
        $recipe->description = request('description');

        if ($request->has('image')) {
            $upload = request('image');
            $destinationPath = public_path('img');
            $filename = request('title');
            $extension = Input::file('image')->getClientOriginalExtension();

            $imageResize = Image::make($upload->getRealPath())
                ->resize(1200,1200,function($c){$c->aspectRatio(); $c->upsize();})
                ->save($destinationPath.'/'.$filename.'.'.$extension);
            $recipe->image = $filename.'.'.$extension;
        }

        $recipe->save();

        $ingredients = request('ingredient_count');
        for ($count = 1; $count <= $ingredients; $count++) {
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
        dd(request()->all());
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
     * Display a listing of the resource with top10 rating.
     *
     * @return \Illuminate\Http\Response
     */
    public function topten() {
        // Recipe::orderBy('rating', 'DESC')->get()
        return view('/topten')->with('recipes', Recipe::orderBy('rating', 'DESC')->take(10)->get());
    }
}
