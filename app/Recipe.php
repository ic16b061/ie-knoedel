<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $table = "recipes";

    protected $fillable = [
        'title', 'image', 'description', 'category', 'rating',
    ];

    function ingredients() {
        return $this->belongsToMany('App\Ingredient', 'recipe_ingredients')
            ->using('App\RecipeIngredient');
    }
}
