<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class BeeDisease extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'symptoms',
        'treatment'
    ];


    //Relationship to Beehives (many to many)
    public function beehives(): BelongsToMany
    {
        return $this->belongsToMany(Beehive::class, 'diseases_cases')
            ->withPivot('date', 'note', 'status')
            ->withTimestamps(); // tylko jeśli chcesz obsługiwać created_at i updated_at
    }
}
