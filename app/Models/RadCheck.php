<?php

namespace App\Models;

use App\Core\Traits\Operator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Radcheck data model.
 *
 * @author      Daryl Peterson <@gmail.com>
 * @copyright   Copyright (c) 2020, Daryl Peterson
 * @license     https://www.gnu.org/licenses/gpl-3.0.txt
 *
 * @since       1.0.0
 *
 * @property string $username
 * @property string $attribute
 * @property string $op
 * @property string $value
 */
class RadCheck extends Model
{
    use HasFactory;
    use Operator;

    protected $table = 'radcheck';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'username',
        'attribute',
        'op',
        'value',
    ];

    /**
     * Check if user exist in table.
     */
    public function scopeExist(Builder $query, string $username): bool
    {
        return $query->where('username', '=', $username)->exists();
    }

    /**
     * Scope for username.
     */
    public function scopeUserName(Builder $query, string $name): Builder
    {
        return $query->where('username', '=', "$name");
    }

    /**
     * Get customer related data.
     *
     * @param bool $model Return model | hasone
     */
    public function user(bool $model = true): Model|HasOne|null
    {
        $result = $this->hasOne(Customer::class, 'username', 'username');
        if ($model) {
            $result = $result->first();
        }

        return $result;
    }

    /**
     * Get customer related data.
     *
     * @param bool $model Return model or HasOne relationship
     */
    public function customer(bool $model = true): Model|HasOne|null
    {
        return $this->user($model);
    }
}
