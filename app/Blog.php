<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Blog
 *
 * @property int $id
 * @property string|null $headline
 * @property string|null $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $is_published
 * @method static \Illuminate\Database\Eloquent\Builder|Blog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog query()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereHeadline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereIsPublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int|null $user_id
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereUserId($value)
 * @property-read \App\User|null $user
 * @property int|null $legacy_user_id
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereLegacyUserId($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Category[] $category
 * @property-read int|null $category_count
 * @property-read \App\LegacyUser|null $legacyUser
 */
class Blog extends Model
{
    protected $casts = [
        'is_published' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function legacyUser()
    {
        return $this->belongsTo(LegacyUser::class, 'legacy_user_id');
    }

    // relationship call with Category
    public function categories(){
        return $this->belongsToMany('App\Category');
    }
}
