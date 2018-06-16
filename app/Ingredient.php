<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $table = "ingredients";
    protected $primaryKey = 'name';
    public $incrementing = false;

    protected $fillable = [
        'name',
    ];

    function recipes() {
        return $this->belongsToMany('App\Recipe', 'recipe_ingredients')->using('App\RecipeIngredient');

        /* return $this
            ->belongsToMany('App\Recipe', 'recipe_ingredient', 'ingredient_name', 'recipe_id')
            ->withPivot('measurement', 'quantity'); */
    }
}
