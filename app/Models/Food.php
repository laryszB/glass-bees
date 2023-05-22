<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Food extends Model
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
    ];


    //Relationship to Beehives (many to many)
    public function beehives(): BelongsToMany
    {
        return $this->belongsToMany(Beehive::class, 'feedings')
            ->withPivot('feeding_date', 'amount', 'note')
            ->withTimestamps(); // tylko jeśli chcesz obsługiwać created_at i updated_at
    }
}
