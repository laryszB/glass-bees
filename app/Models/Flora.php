<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Flora extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'flowering_period_start',
        'flowering_period_end'
    ];


    //Relationship to Apiaries (many to many)
    public function apiaries(): BelongsToMany
    {
        return $this->belongsToMany(Apiary::class);
    }
}
