<?php

//Andrés Prda Rodríguez

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Routine extends Model
{
    use HasFactory;

    /**
     * ROUTINE ATTRIBUTES
     * $this->attributes['id'] - int - contains the routine primary key (id)
     * $this->attributes['type'] - string - contains the  routine type
     * $this->attributes['trainingcontexts_id'] - int - contains the routine trainingcontexts_id
     */
    protected $fillable = [
        'type',
        'trainingcontexts_id',
        'exercises_id',
    ];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getType(): string
    {
        return $this->attributes['type'];
    }

    public function setType(string $type): void
    {
        $this->attributes['type'] = $type;
    }

    public function getTrainingcontextsId(): int
    {
        return $this->attributes['trainingcontexts_id'];
    }

    public function setTrainingcontextId(int $trainingcontext_id): void
    {
        $this->attributes['trainingcontext_id'] = $trainingcontext_id;
    }

    public function trainingcontext(): BelongTo
    {
        return $this->belongsTo(Trainingcontext::class);
    }

    public function getExercisesId(): int
    {
        return $this->attributes['exercises_id'];
    }

    public function setExercisesId(int $exercises_id): void
    {
        $this->attributes['exercises_id'] = $exercises_id;
    }
}
