<?php

namespace App\Models;

use App\Core\Traits\Operator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * RadGroupCheck data model.
 *
 * @author      Daryl Peterson <@gmail.com>
 * @copyright   Copyright (c) 2020, Daryl Peterson
 * @license     https://www.gnu.org/licenses/gpl-3.0.txt
 *
 * @since       1.0.0
 *
 * @property string $groupname
 * @property string $attribute
 * @property string $op
 * @property string $value
 */
class RadGroupCheck extends Model
{
    use HasFactory;
    use Operator;

    protected $table = 'radgroupcheck';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'groupname',
        'attribute',
        'op',
        'value',
    ];

    /**
     * Scope for username.
     */
    public function scopeGroupName(Builder $query, string $name): Builder
    {
        return $query->where('groupname', '=', "$name");
    }

    public function service(): HasOne
    {
        return $this->hasOne(Service::class, 'name', 'groupname');
    }
}
