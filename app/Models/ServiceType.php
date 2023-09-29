<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class description.
 *
 * @category
 *
 * @author      Daryl Peterson <@gmail.com>
 * @copyright   Copyright (c) 2020, Daryl Peterson
 * @license     https://www.gnu.org/licenses/gpl-3.0.txt
 *
 * @since       1.0.0
 *
 * @property string $name
 */
class ServiceType extends Model
{
    use HasFactory;
    use HasTimestamps;

    protected $table = 'service_type';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'name',
    ];

    public static function getByName(string $name): ?int
    {
        $result = ServiceType::where('name', '=', $name)->first();
        if (!isset($result)) {
            return null;
        }

        return $result->id;
    }

    public function service(): HasMany
    {
        return $this->hasMany(Service::class, 'type_id', 'id');
    }

    public function customer(): HasMany
    {
        return $this->hasMany(Customer::class, 'svc_type', 'id');
    }
}
