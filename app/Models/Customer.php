<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Collection;

/**
 * Customer data model.
 *
 * @author      Daryl Peterson <@gmail.com>
 * @copyright   Copyright (c) 2020, Daryl Peterson
 * @license     https://www.gnu.org/licenses/gpl-3.0.txt
 *
 * @since       1.0.0
 *
 * @property string $account
 * @property string $agreement
 * @property string $username
 * @property string $password
 * @property string $firstname
 * @property string $lastname
 * @property string $company
 * @property string $email
 * @property string $phone
 * @property string $mobile
 * @property string $address
 * @property string $city
 * @property string $state
 * @property string $zip
 * @property int    $gpslat
 * @property int    $gpslong
 * @property string $comment
 */
class Customer extends Model
{
    use HasFactory;
    use HasTimestamps;

    protected $table = 'customer';
    protected $primaryKey = 'username';
    public $timestamps = true;
    public $incrementing = false;

    protected $fillable = [
        'account',
        'agreement',
        'username',
        'password',
        'svc_type',
        'svc_id',
        'firstname',
        'lastname',
        'company',
        'email',
        'phone',
        'mobile',
        'address',
        'city',
        'state',
        'zip',
        'gpslat',
        'gpslong',
        'comment',
        'created_at',
        'updated_at',
    ];

    public function serviceType(bool $model = true): Model|HasOne|null
    {
        $result = $this->hasOne(ServiceType::class, 'id', 'svc_type');
        if ($model) {
            $result = $result->first();
        }

        return $result;
    }

    public function service(bool $model = true): Model|HasOne|null
    {
        $result = $this->hasOne(Service::class, 'id', 'svc_id');
        if ($model) {
            $result = $result->first();
        }

        return $result;
    }

    public function radUserGroup(bool $collection = true): Collection|HasMany
    {
        $result = $this->hasMany(RadUserGroup::class, 'username', 'username');
        if ($collection) {
            $result = $result->get();
        }

        return $result;
    }

    public function radCheck(bool $collection = true): Collection|HasMany
    {
        $result = $this->hasMany(RadCheck::class, 'username', 'username');
        if ($collection) {
            $result = $result->get();
        }

        return $result;
    }

    public function radReply(bool $collection = true): Collection|HasMany
    {
        $result = $this->hasMany(RadReply::class, 'username', 'username');
        if ($collection) {
            $result = $result->get();
        }

        return $result;
    }

    /**
     * Firstname mutator.
     */
    public function setFirstNameAttribute(string $value): void
    {
        $this->attributes['firstname'] = ucwords(strtolower($value));
    }

    /**
     * Firstname accessor.
     */
    public function getFirstNameAttribute(string $value): string
    {
        return ucwords($value);
    }

    /**
     * Lastname mutator.
     */
    public function setLastNameAttribute(string $value): void
    {
        $this->attributes['lastname'] = ucwords(strtolower($value));
    }

    /**
     * Lastname accessor.
     */
    public function getLastNameAttribute(string $value): string
    {
        return ucwords($value);
    }

    /**
     * State mutator.
     */
    public function setStateAttribute(string $value): void
    {
        $this->attributes['state'] = ucwords(strtolower($value));
    }

    /**
     * State accessor.
     */
    public function getStateAttribute(string $value): string
    {
        return ucwords($value);
    }

    /**
     * City mutator.
     */
    public function setCityAttribute(string $value): void
    {
        $this->attributes['city'] = ucwords(strtolower($value));
    }

    /**
     * City accessor.
     */
    public function getCityAttribute(string $value): string
    {
        return ucwords($value);
    }
}
