<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // fillable = which field are allowed for mass assignment
    //protected $fillable = ['title', 'excerpt', 'text'];

    // guarded = which fields are not allowed for mass assigment
    protected $guarded = [];

    //relationship call with User class
    public function user()
    {
        //fetch user for this article
        return $this->belongsTo(User::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }

}
