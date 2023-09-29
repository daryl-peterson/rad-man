<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Service data table.
 *
 * @author      Daryl Peterson <@gmail.com>
 * @copyright   Copyright (c) 2020, Daryl Peterson
 * @license     https://www.gnu.org/licenses/gpl-3.0.txt
 *
 * @since       1.0.0
 *
 * @property string $name
 */
class Service extends Model
{
    use HasFactory;
    use HasTimestamps;

    protected $table = 'service';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'type_id',
        'code',
    ];

    public function type(): BelongsTo
    {
        return $this->belongsTo(ServiceType::class, 'type_id', 'id');
    }

    public function reply(): HasMany
    {
        return $this->hasMany(RadGroupReply::class, 'groupname', 'name');
    }

    public function check(): HasMany
    {
        return $this->hasMany(RadGroupCheck::class, 'groupname', 'name');
    }
}
