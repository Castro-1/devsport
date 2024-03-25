<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Trainingcontext extends Model
{
    use HasFactory;

    /**
     * TRAININGCONTEXT ATTRIBUTES
     * $this->attributes['id'] - int - contains the trainingcontext primary key (id)
     * $this->attributes['time'] - int - contains the trainingcontext time
     * $this->attributes['place'] - string - contains the trainingcontext place
     * $this->attributes['frequency'] - int - contains the trainingcontext frequency
     * $this->attributes['level'] - int - contains the trainingcontext level
     * $this->attributes['objectives'] - json - contains the trainingcontext objectives
     * $this->attributes['specifications'] - string - contains the trainingcontext specifications
     */

    protected $fillable = [
        'time',
        'place',
        'frequency',
        'level',
        'objectives',
        'specifications',
    ];

    protected $casts = [
        'objectives' => 'array',
    ];
    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getTime(): int
    {
        return $this->attributes['time'];
    }

    public function setTime(int $time): void
    {
        $this->attributes['time'] = $time;
    }

    public function getPlace(): string
    {
        return $this->attributes['place'];
    }

    public function setPlace(string $place): void
    {
        $this->attributes['place'] = $place;
    }

    public function getFrequency(): int
    {
        return $this->attributes['frequency'];
    }

    public function setFrequency(int $frequency): void
    {
        $this->attributes['frequency'] = $frequency;
    }

    public function getLevel(): int
    {
        return $this->attributes['level'];
    }

    public function setLevel(int $level): void
    {
        $this->attributes['level'] = $level;
    }

    public function getObjectives(): array
    {
        return $this->attributes['objectives'];
    }

    public function setObjectives(array $objectives): void
    {
        $this->attributes['objectives'] = $objectives;
    }

    public function getSpecifications(): string
    {
        return $this->attributes['specifications'];
    }

    public function routines(): HasMany
    {
        return $this->hasMany(Routine::class);
    }
}
