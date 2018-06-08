<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $table = "recipes";

    function ingredients() {
        return $this->belongsToMany('App\Ingredient')->using('App\RecipeIngredient');
    }

    protected $fillable = [
        'title', 'image', 'description', 'category', 'rating',
    ];

}
