<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\LegacyUser
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $vorname
 * @method static \Illuminate\Database\Eloquent\Builder|LegacyUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LegacyUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LegacyUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|LegacyUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LegacyUser whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LegacyUser whereVorname($value)
 * @mixin \Eloquent
 */
class LegacyUser extends Model
{
    protected $connection = 'mysql_secondary';

    protected $table = 'legacy_users';
}
