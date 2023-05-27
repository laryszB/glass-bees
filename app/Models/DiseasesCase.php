<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiseasesCase extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'date',
        'note',
    ];

    public function beehive()
    {
        return $this->belongsTo(Beehive::class);
    }

    public function bee_disease()
    {
        return $this->belongsTo(BeeDisease::class);
    }
}
