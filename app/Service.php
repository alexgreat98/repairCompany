<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Carbon;

/**
 * App\Service
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string|null $text
 * @property string|null $image
 * @property string|null $title
 * @property string|null $description
 * @property string|null $keywords
 * @property int $sort
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property int $show_on_main
 * @property-read Collection|Image[] $images
 * @property-read int|null $images_count
 * @property-read Collection|Price[] $prices
 * @property-read int|null $prices_count
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|Service newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service newQuery()
 * @method static Builder|Service onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Service query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereShowOnMain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereUpdatedAt($value)
 * @method static Builder|Service withTrashed()
 * @method static Builder|Service withoutTrashed()
 * @mixin Eloquent
 */
class Service extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'text',
        'image',
        'title',
        'description',
        'keywords',
        'slug',
        'sort',
        'show_on_main'
    ];

    /**
     * Атрибуты, которые должны быть преобразованы в даты.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function prices()
    {
        return $this->hasMany(Price::class, 'services_id', 'id');
    }

    public function images()
    {
        return $this->belongsToMany(Image::class, 'services_has_images', 'services_id', 'images_id');
    }
}
