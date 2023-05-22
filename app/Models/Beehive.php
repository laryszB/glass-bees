<?php

    namespace App\Models;

    use App\Policies\BeehivePolicy;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;
    use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

        protected $policies = [
            Beehive::class => BeehivePolicy::class,
        ];

        //Relationship to Apiary
        public function apiary(): BelongsTo
        {
            return $this->belongsTo(Apiary::class);
        }

        //Relationship to Beehives (many to many)
        public function food(): BelongsToMany
        {
            return $this->belongsToMany(Food::class, 'feedings')
                ->withPivot('feeding_date', 'amount', 'note')
                ->withTimestamps(); // tylko jeśli chcesz obsługiwać created_at i updated_at
        }

    }
