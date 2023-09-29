<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * RadPostAuth data model.
 *
 * @author      Daryl Peterson <@gmail.com>
 * @copyright   Copyright (c) 2020, Daryl Peterson
 * @license     https://www.gnu.org/licenses/gpl-3.0.txt
 *
 * @since       1.0.0
 *
 * @property string $username
 * @property string $pass
 * @property string $reply
 * @property string $authdate
 * @property string $class
 */
class RadPostAuth extends Model
{
    use HasFactory;

    protected $table = 'radpostauth';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'username',
        'pass',
        'reply',
        'authdate',
        'class',
    ];
}
