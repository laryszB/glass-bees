<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MotherBee extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'beehive_id',
        'race',
        'line',
        'placement_date',
        'birth_date',
        'state',
        'note'
    ];

    //Relationship to Beehive
    public function beehive(): BelongsTo
    {
        return $this->belongsTo(Beehive::class);
    }
}
