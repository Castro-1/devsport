<?php

//Andrés Prda Rodríguez

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Trainingcontext extends Model
{
    

    /**
     * TRAININGCONTEXT ATTRIBUTES
     * $this->attributes['id'] - int - contains the trainingcontext primary key (id)
     * $this->attributes['users_id'] - int - contains the trainingcontext users_id
     * $this->attributes['name'] - string - contains the trainingcontext name
     * $this->attributes['time'] - int - contains the trainingcontext time
     * $this->attributes['place'] - string - contains the trainingcontext place
     * $this->attributes['frequency'] - int - contains the trainingcontext frequency
     * $this->attributes['objectives'] - json - contains the trainingcontext objectives
     * $this->attributes['specifications'] - string - contains the trainingcontext specifications
     * $this->attributes['created_at'] - timestamp - contains the trainingcontext creation date
     * $this->attributes['updated_at'] - timestamp - contains the trainingcontext update date
     */
    protected $fillable = [
        'users_id',
        'name',
        'time',
        'place',
        'frequency',
        'objectives',
        'specifications',
    ];

    protected $casts = [
        'objectives' => 'array',
    ];

    public static function validate($request): void
    {
        $request->validate([
            'name' => 'required|max:255',
            'time' => 'required|numeric|gt:0',
            'place' => 'required',
            'frequency' => 'required|numeric|gt:0',
            'objectives' => 'required',
            'specifications' => 'required',
        ]);
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getUsers_Id(): int
    {
        return $this->attributes['users_id'];
    }

    public function setUsers_Id(int $users_id): void
    {
        $this->attributes['users_id'] = $users_id;
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
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

    public function getObjectives(): string
    {
        return $this->attributes['objectives'];
    }

    public function setObjectives(string $objectives): void
    {
        $this->attributes['objectives'] = $objectives;
    }

    public function getSpecifications(): string
    {
        return $this->attributes['specifications'];
    }

    public function setSpecifications(string $specifications): void
    {
        $this->attributes['specifications'] = $specifications;
    }

    public function routines(): HasMany
    {
        return $this->hasMany(Routine::class);
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function setCreatedAt($value): void
    {
        $this->attributes['created_at'] = $value;
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public function setUpdatedAt($value): void
    {
        $this->attributes['updated_at'] = $value;
    }

}
