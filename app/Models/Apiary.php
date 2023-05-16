<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
        'zip_code',
        'photo'
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

    // Relationship to User
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    //Relationship to Flora (many to many)
    public function floras(): BelongsToMany
    {
        return $this->belongsToMany(Flora::class);
    }
}
