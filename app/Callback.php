<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Callback
 *
 * @property int $id
 * @property string $name
 * @property int $phone
 * @property string|null $comment
 * @property int $look
 * @property int $answer
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Callback newModelQuery()
 * @method static Builder|Callback newQuery()
 * @method static Builder|Callback query()
 * @method static Builder|Callback whereAnswer($value)
 * @method static Builder|Callback whereComment($value)
 * @method static Builder|Callback whereCreatedAt($value)
 * @method static Builder|Callback whereId($value)
 * @method static Builder|Callback whereLook($value)
 * @method static Builder|Callback whereName($value)
 * @method static Builder|Callback wherePhone($value)
 * @method static Builder|Callback whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Callback extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'comment',
        'order'
    ];
    protected $guarded = [
        'answer',
        'look',

    ];
}
