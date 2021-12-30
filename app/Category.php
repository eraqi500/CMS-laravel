<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static pluck(string $string, string $string1)
 */
class Category extends Model
{
    protected $fillable = ['name'];
}
