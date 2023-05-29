<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeeColony extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'beehive_id',
        'name',
        'strength',
        'temperament',
        'description',
    ];

    //Relationship to Beehive
    public function beehive()
    {
        return $this->belongsTo(Beehive::class);
    }
}
