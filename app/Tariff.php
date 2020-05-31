<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property int $market_type
 * @property int $deposit
 * @property int $min
 * @property int $min_condition
 */
class Tariff extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'market_type',
        'deposit',
        'min',
        'min_condition',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'market_type' => 'integer',
        'deposit' => 'integer',
        'min' => 'integer',
        'min_condition' => 'integer',
    ];
}
