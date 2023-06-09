<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HoneyHarvest extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'apiary_id',
        'weight',
        'volume',
        'profit',
        'price',
        'average_weight_per_beehive',
        'harvest_date'
    ];

    //Relationship to Apiary
    public function apiary(): BelongsTo
    {
        return $this->belongsTo(Apiary::class);
    }
}
