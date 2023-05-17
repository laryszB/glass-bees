<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Beehive extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'apiary_id',
        'name',
        'description',
        'type',
        'bodies',
        'bottoms',
        'extensions',
        'half_extensions',
        'frames',
        'note'
    ];

    //Relationship to Apiary
    public function apiary(): BelongsTo
    {
        return $this->belongsTo(Apiary::class);
    }

}
