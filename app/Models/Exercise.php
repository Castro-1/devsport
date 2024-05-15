<?php

// Andrés Prda Rodríguez

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    /**
     * EXERCISE ATTRIBUTES
     * $this->attributes['id'] - int - contains the exercise primary key (id)
     * $this->attributes['name'] - string - contains the  exercise name
     * $this->attributes['musclegroup'] - string - contains the exercise musclegroup
     * $this->attributes['image'] - binary - contains the exercise image
     * $this->attributes['recommendations'] - string - contains the exercise recommendations
     * $this->attributes['repetitions'] - int - contains the exercise repetitions
     * $this->attributes['sets'] - int - contains the exercise sets
     * $this->attributes['created_at'] - timestamp - contains the exercise creation date
     * $this->attributes['updated_at'] - timestamp - contains the exercise update date
     */
    protected $fillable = [
        'name',
        'musclegroup',
        'image',
        'recommendations',
        'repetitions',
        'sets', 
    ];

    public static function validate($request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'musclegroup' => 'required',
        ]);
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getName(): string | null
    {
        return $this->attributes['name'];
    }

    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
    }

    public function getMusclegroup(): string
    {
        return $this->attributes['musclegroup'];
    }

    public function setMusclegroup(string $musclegroup): void
    {
        $this->attributes['musclegroup'] = $musclegroup;
    }

    public function getImage(): string
    {
        return $this->attributes['image'];
    }

    public function setImage(?string $image): void
    {
        $this->attributes['image'] = $image;
    }

    public function getRecommendations(): string
    {
        return $this->attributes['recommendations'];
    }

    public function setRecommendations(?string $recommendations): void
    {
        $this->attributes['recommendations'] = $recommendations;
    }

    public function getRepetitions(): int
    {
        return $this->attributes['repetitions'];
    }

    public function setRepetitions(?int $repetitions): void
    {
        $this->attributes['repetitions'] = $repetitions;
    }

    public function getSets(): ?int
    {
        return $this->attributes['sets'];
    }

    public function setSets(?int $sets): void
    {
        $this->attributes['sets'] = $sets;
    }

    public function routines()
    {
        return $this->belongsToMany(Routine::class, 'routine_exercise')->withPivot('type')->withTimestamps();
    }
}
