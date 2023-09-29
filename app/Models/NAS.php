<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * Nas data model.
 *
 * @author      Daryl Peterson <@gmail.com>
 * @copyright   Copyright (c) 2020, Daryl Peterson
 * @license     https://www.gnu.org/licenses/gpl-3.0.txt
 *
 * @since       1.0.0
 *
 * @property string $nasname     IP Address
 * @property string $shortname   A short alias that can be used in place of the IP address or fully qualified hostname provided in the first line of the section.
 * @property string $type        User access port type
 * @property int    $ports       Identifier of the NAS port that is authenticating the user
 * @property string $secret      The RADIUS shared secret used for communication between the client/NAS and the RADIUS server.
 * @property string $community   SNMP Community
 * @property string $description
 */
class NAS extends Model
{
    use HasFactory;

    protected $table = 'nas';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'nasname',
        'shortname',
        'type',
        'ports',
        'secret',
        'server',
        'community',
        'description',
    ];

    /**
     * Scope a for nasname.
     */
    public function scopeNasName(Builder $query, string $name): Builder
    {
        return $query->where('nasname', '=', "$name");
    }

    public static function listing(): Collection
    {
        return NAS::orderBy('nasname', 'asc')->get();
    }
}
