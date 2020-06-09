<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    protected $fillable = [
		'name', 'age', 'gender', 'movie_id'
    ];
}
