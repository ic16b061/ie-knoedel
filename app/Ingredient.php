<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $table = "ingredients";

    function recipes() {
        return $this->belongsToMany('App\Recipe')->using('App\RecipeIngredient');
    }

    protected $fillable = [
        'name',
    ];
}
