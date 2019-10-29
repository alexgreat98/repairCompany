<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Param
 *
 * @property int $id
 * @property string $key
 * @property string $value
 * @property string $description
 * @property string $type
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Param newModelQuery()
 * @method static Builder|Param newQuery()
 * @method static Builder|Param query()
 * @method static Builder|Param whereCreatedAt($value)
 * @method static Builder|Param whereDescription($value)
 * @method static Builder|Param whereId($value)
 * @method static Builder|Param whereKey($value)
 * @method static Builder|Param whereType($value)
 * @method static Builder|Param whereUpdatedAt($value)
 * @method static Builder|Param whereValue($value)
 * @mixin Eloquent
 */
class Param extends Model
{

    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'key';
    }

    //
    protected $table = 'params';
    protected $fillable = ['key', 'value', 'description', 'type'];
    static public function getP($key){
            $p = Param::where('key', $key)->first();
            return $p->value;
    }

}
