<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * RadAcct data model.
 *
 * @author      Daryl Peterson <@gmail.com>
 * @copyright   Copyright (c) 2020, Daryl Peterson
 * @license     https://www.gnu.org/licenses/gpl-3.0.txt
 *
 * @since       1.0.0
 *
 * @property string $acctsessionid
 * @property string $acctuniqueid
 * @property string $username
 * @property string $realm
 * @property string $nasipaddress
 * @property string $nasporttype
 * @property string $acctstarttime
 * @property string $acctupdatetime
 * @property string $acctstoptime
 * @property string $acctinterval
 * @property string $acctsessiontime
 * @property string $acctauthentic
 * @property string $connectinfo_start
 * @property string $connectinfo_stop
 * @property string $acctinputoctets
 * @property string $acctoutputoctets
 * @property string $calledstationid
 * @property string $callingstationid
 * @property string $acctterminatecause
 * @property string $servicetype
 * @property string $framedprotocol
 * @property string $framedipaddress
 * @property string $framedipv6address
 * @property string $framedipv6prefix
 * @property string $framedinterfaceid
 * @property string $delegatedipv6prefix
 * @property string $class
 */
class RadAcct extends Model
{
    use HasFactory;

    protected $table = 'radacct';
    protected $primaryKey = 'id';

    public $timestamps = false;
    protected $fillable = [
        'acctsessionid',
        'acctuniqueid',
        'username',
        'realm',
        'nasipaddress',
        'nasportid',
        'nasporttype',
        'acctstarttime',
        'acctupdatetime',
        'acctstoptime',
        'acctinterval',
        'acctsessiontime',
        'acctauthentic',
        'connectinfo_start',
        'connectinfo_stop',
        'acctinputoctets',
        'acctoutputoctets',
        'calledstationid',
        'callingstationid',
        'acctterminatecause',
        'servicetype',
        'framedprotocol',
        'framedipaddress',
        'framedipv6address',
        'framedipv6prefix',
        'framedinterfaceid',
        'delegatedipv6prefix',
        'class',
    ];

    public function scopeLogSearch(
        Builder $query,
        string $username = null,
        string $sdate = null,
        string $edate = null,
        string $nas = null
    ): Builder {
        $query = $this->scopeUserName($query, $username);
        $query = $this->scopeStartDate($query, $sdate);
        $query = $this->scopeStopDate($query, $edate);

        return $query;
    }

    public function scopeUserName(Builder $query, string $username = null): Builder
    {
        if (isset($username)) {
            $query = $query->where('username', '=', $username);
        }

        return $query;
    }

    public function scopeStartDate(Builder $query, string $date = null): Builder
    {
        if (isset($date)) {
            $query = $query->whereDate('acctstarttime', '>=', $date);
        }

        return $query;
    }

    public function scopeStopDate(Builder $query, string $date = null): Builder
    {
        return $query->whereDate('acctstoptime', '<=', $date);
    }

    public function scopeNasIpAddress(Builder $query, string $nas = null)
    {
        if (isset($nas)) {
            $query = $query->where('username', '=', $nas);
        }

        return $query;
    }
}
