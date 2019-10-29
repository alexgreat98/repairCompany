<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Image
 *
 * @property int $id
 * @property string $url
 * @property int $portfolio_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Portfolio $portfolio
 * @property-read Collection|Service[] $services
 * @property-read int|null $services_count
 * @method static Builder|Image newModelQuery()
 * @method static Builder|Image newQuery()
 * @method static Builder|Image query()
 * @method static Builder|Image whereCreatedAt($value)
 * @method static Builder|Image whereId($value)
 * @method static Builder|Image wherePortfolioId($value)
 * @method static Builder|Image whereUpdatedAt($value)
 * @method static Builder|Image whereUrl($value)
 * @mixin Eloquent
 */
class Image extends Model
{
    protected $fillable = ['url', 'portfolio_id'];

    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class, 'portfolio_id');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'services_has_images', 'images_id', 'services_id');
    }
}
