<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $code
 * @property string $title
 * @property int $market_type
 * @property int $tariff_id
 * @property int $user_id
 */
class Profile extends Model
{
    const MARKET_TYPE_FOREX = 0;
    const MARKET_TYPE_FOUND = 1;

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
        'code',
        'title',
        'market_type',
        'tariff_id',
        'user_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'market_type' => 'integer',
        'tariff_id' => 'integer',
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tariff()
    {
        return $this->belongsTo(\App\Tariff::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }
}
