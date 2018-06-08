<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipeIngredient extends Pivot
{
    protected $fillable = [
        'quantity',
    ];
}
