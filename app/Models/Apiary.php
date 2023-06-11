<?php

namespace App\Models;

use App\Policies\ApiaryPolicy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Apiary extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'user_id',
        'description',
        'street_number',
        'street_name',
        'city',
        'country',
        'latitude',
        'longitude',
        'zip_code',
        'photo'
    ];

    protected $policies = [
        Apiary::class => ApiaryPolicy::class,
    ];


    public function scopeFilter($query, array $filters){
        if($filters['search'] ?? false){
            $query->where('name', 'like', '%'. request('search'). '%')
                ->orWhere('description', 'like', '%'. request('search'). '%')
                ->orWhere('street_name', 'like', '%'. request('search'). '%')
                ->orWhere('city', 'like', '%'. request('search'). '%')
                ->orWhere('country', 'like', '%'. request('search'). '%');

        }
    }

    // Zlicz wszystkie ule w danej pasiece
    public function countBeehives()
    {
        return $this->beehives()->count();
    }
    // Zlicz wszystkie ramki w danej pasiece
    public function getTotalBeehivesFrames()
    {
        return $this->beehives()->sum('frames');
    }



    // Relationship to User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    //Relationship to Flora (many to many)
    public function floras(): BelongsToMany
    {
        return $this->belongsToMany(Flora::class);
    }

    //Relationship to Beehive
    public function beehives(): hasMany
    {
        return $this->hasMany(Beehive::class);
    }

    //Relationship to HoneyHarvest
    public function honeyHarvests(): hasMany
    {
        return $this->hasMany(HoneyHarvest::class);
    }
}
