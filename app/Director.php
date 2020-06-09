<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    protected $fillable = [
		'name', 'age', 'gender', 'movie_id'
    ];
}
