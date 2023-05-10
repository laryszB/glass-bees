<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'description',
        'street_number',
        'street_name',
        'city',
        'country',
        'zip_code'
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
}
