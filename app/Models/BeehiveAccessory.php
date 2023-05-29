<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class BeehiveAccessory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    //Relationship to Beehive (many to many)
    public function beehives(): BelongsToMany
    {
        return $this->belongsToMany(Beehive::class, 'beehive_beehive_accessories');
    }

}
