<?php

// Andrés Prada Rodríguez  

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoutineExercise extends Model
{
    use HasFactory;

    /**
     * ROUTINEEXERCISE ATTRIBUTES
     * $this->attributes['id'] - int - contains the routine_exercise primary key (id)
     * $this->attributes['routine_id'] - int - contains the routine ID
     * $this->attributes['exercise_id'] - int - contains the exercise ID
     * $this->attributes['created_at'] - timestamp - contains the routine_exercise creation date
     * $this->attributes['updated_at'] - timestamp - contains the routine_exercise update date
     */
    protected $fillable = [
        'routine_id',
        'exercise_id',
    ];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getRoutineId(): int
    {
        return $this->attributes['routine_id'];
    }

    public function setRoutineId(int $routine_id): void
    {
        $this->attributes['routine_id'] = $routine_id;
    }

    public function getExerciseId(): int
    {
        return $this->attributes['exercise_id'];
    }

    public function setExerciseId(int $exercise_id): void
    {
        $this->attributes['exercise_id'] = $exercise_id;
    }

    public function routine()
    {
        return $this->belongsTo(Routine::class);
    }

    public function exercise()
    {
        return $this->belongsTo(Exercise::class);
    }
}
