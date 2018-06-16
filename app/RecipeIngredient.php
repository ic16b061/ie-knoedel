<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class RecipeIngredient extends Pivot
{
    protected $table = "recipe_ingredients";

    protected $fillable = [
        'recipe_id', 'ingredient_name', 'measurement', 'quantity',
    ];
}
