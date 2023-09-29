<?php

namespace App\Models;

use App\Core\Traits\Operator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * RadGroupReply data model.
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
class RadGroupReply extends Model
{
    use HasFactory;
    use Operator;

    protected $table = 'radgroupreply';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'groupname',
        'attribute',
        'op',
        'value',
    ];

    public function service()
    {
        return $this->hasOne(Service::class, 'name', 'groupname');
    }
}
