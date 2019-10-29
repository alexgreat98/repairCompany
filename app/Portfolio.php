<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Portfolio
 *
 * @property int $id
 * @property string $name
 * @property string|null $text
 * @property string|null $title
 * @property string|null $description
 * @property string|null $keywords
 * @property int $sort
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int $show_on_main
 * @property-read Collection|Image[] $images
 * @property-read int|null $images_count
 * @method static Builder|Portfolio newModelQuery()
 * @method static Builder|Portfolio newQuery()
 * @method static Builder|Portfolio query()
 * @method static Builder|Portfolio whereCreatedAt($value)
 * @method static Builder|Portfolio whereDeletedAt($value)
 * @method static Builder|Portfolio whereDescription($value)
 * @method static Builder|Portfolio whereId($value)
 * @method static Builder|Portfolio whereKeywords($value)
 * @method static Builder|Portfolio whereName($value)
 * @method static Builder|Portfolio whereShowOnMain($value)
 * @method static Builder|Portfolio whereSort($value)
 * @method static Builder|Portfolio whereText($value)
 * @method static Builder|Portfolio whereTitle($value)
 * @method static Builder|Portfolio whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Portfolio extends Model
{
    protected $table = 'portfolio';
    protected $fillable = ['name', 'text', 'description', 'title', 'sort', 'show_on_main'];

    public function images()
    {
        return $this->hasMany(Image::class, 'portfolio_id', 'id');
    }
}
