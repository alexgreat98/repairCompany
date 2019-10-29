<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Carbon;

/**
 * App\Price
 *
 * @property int $id
 * @property string $name
 * @property int $price
 * @property string $type
 * @property int $services_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property int $sort
 * @property-read Service $service
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|Price newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Price newQuery()
 * @method static Builder|Price onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Price query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|Price whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Price whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Price whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Price whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Price wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Price whereServicesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Price whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Price whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Price whereUpdatedAt($value)
 * @method static Builder|Price withTrashed()
 * @method static Builder|Price withoutTrashed()
 * @mixin Eloquent
 */
class Price extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'price',
        'type',
        'services_id',
        'sort'
    ];

    /**
     * Атрибуты, которые должны быть преобразованы в даты.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function service()
    {
        return $this->belongsTo(Service::class, 'services_id');
    }
}
