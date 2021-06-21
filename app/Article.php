<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // fillable = which field are allowed for mass assignment
    //protected $fillable = ['title', 'excerpt', 'text'];

    // guarded = which fields are not allowed for mass assigment
    protected $guarded = [];
}
