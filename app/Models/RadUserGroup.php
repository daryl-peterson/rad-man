<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * RadUserGroup data model.
 *
 * @author      Daryl Peterson <@gmail.com>
 * @copyright   Copyright (c) 2020, Daryl Peterson
 * @license     https://www.gnu.org/licenses/gpl-3.0.txt
 *
 * @since       1.0.0
 *
 * @property string $userName
 * @property string $groupName
 * @property int    $priority
 */
class RadUserGroup extends Model
{
    use HasFactory;

    protected $table = 'radusergroup';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'username',
        'groupname',
        'priority',
    ];

    /**
     * Check if user exist.
     */
    public function scopeUserExist(Builder $query, string $userName): bool
    {
        return $this->scopeUser($query, $userName)->exists();
    }

    /**
     * Scope for user.
     */
    public function scopeUser(Builder $query, string $userName): Builder
    {
        return $query->where('username', '=', $userName);
    }

    /**
     * Check if group exist.
     */
    public function scopeGroupExist(Builder $query, string $groupName): bool
    {
        return $this->scopeGroup($query, $groupName)->exists();
    }

    /**
     * Scope for group.
     */
    public function scopeGroup(Builder $query, string $groupName): Builder
    {
        return $query->where('groupname', '=', $groupName);
    }

    /**
     * Get service model or relation.
     */
    public function service(bool $model = true): Model|HasOne|null
    {
        $result = $this->hasOne(Service::class, 'name', 'groupname');
        if ($model) {
            $result = $result->first();
        }

        return $result;
    }

    /**
     * Get customer model or relation.
     */
    public function customer(bool $model = true): Model|HasOne|null
    {
        $result = $this->hasOne(Customer::class, 'username', 'username');
        if ($model) {
            $result = $result->first();
        }

        return $result;
    }

    /**
     * Get customer model or relation.
     */
    public function user(bool $model = true): Model|HasOne|null
    {
        return $this->customer($model);
    }
}
