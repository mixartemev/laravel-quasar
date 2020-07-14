<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $market
 * @property string $ts_code
 * @property int $profile_id
 * @property int $tariff_id
 */
class Market extends Model
{
    const CUR_RUB = 0;
    const CUR_USD = 1;

    const MARKET_FRX = 0;
    const MARKET_MOEX = 1;
    const MARKET_SPBX = 2;

    const MARKET_TYPE = [
        self::MARKET_FRX => Profile::MARKET_TYPE_FOREX,
        self::MARKET_MOEX => Profile::MARKET_TYPE_FOUND,
        self::MARKET_SPBX => Profile::MARKET_TYPE_FOUND,
    ];

    const MARKET_CUR = [
        self::MARKET_FRX => self::CUR_RUB,
        self::MARKET_MOEX => self::CUR_RUB,
        self::MARKET_SPBX => self::CUR_USD,
    ];

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
        'market',
        'ts_code',
        'profile_id',
        'tariff_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'market' => 'integer',
        'profile_id' => 'integer',
        'tariff_id' => 'integer',
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tariff()
    {
        return $this->belongsTo(Tariff::class);
    }
}
