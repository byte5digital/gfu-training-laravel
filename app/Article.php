<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Article
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Tag[] $tags
 * @property-read int|null $tags_count
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $excerpt
 * @property string $body
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereExcerpt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereUserId($value)
 */
class Article extends Model
{
    //allow mass assignment for title, excerpt and body
    protected $fillable = ['title', 'excerpt', 'body'];

    //relationship call w User class
    public function user()
    {
        //this (one article) belongs to a user
        return $this->belongsTo('App\User');
    }

    //relationship call w Tag class
    public function tags()
    {
        //this (one article) belongs to many tags
        return $this->belongsToMany('App\Tag');
    }
}
