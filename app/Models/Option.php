<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 * @package App\Models
 *
 * @property string $sale
 * @property string $text
 */
class Option extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'sale',
        'text',
    ];
}
