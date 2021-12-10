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
    public const UMEE_SALE = 'umee';
    public const PSTAKE_SALE = 'pstake';

    public const SALES = [
        self::UMEE_SALE,
        self::PSTAKE_SALE,
    ];

    /**
     * @var array
     */
    protected $fillable = [
        'sale',
        'text',
    ];
}
