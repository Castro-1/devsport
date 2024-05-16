<?php

// Andrés Prda Rodríguez

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Routine extends Model
{
    /**
     * ROUTINE ATTRIBUTES
     * $this->attributes['id'] - int - contains the routine primary key (id)
     * $this->attributes['type'] - string - contains the routine type
     * $this->attributes['name'] - string - contains the routine name
     * $this->attributes['trainingcontext_id'] - int - contains the routine trainingcontext_id
     * $this->attributes['created_at'] - timestamp - contains the routine creation date
     * $this->attributes['updated_at'] - timestamp - contains the routine update date
     */
    protected $fillable = [
        'type',
        'name',
        'trainingcontexts_id',
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

    public function getName(): string | null
    {
        return $this->attributes['name'];
    }

    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
    }

    public function getTrainingcontextId(): int
    {
        return $this->attributes['trainingcontexts_id'];
    }

    public function setTrainingcontextId(int $trainingcontext_id): void
    {
        $this->attributes['trainingcontexts_id'] = $trainingcontext_id;
    }

    public function trainingcontext()
    {
        return $this->belongsTo(Trainingcontext::class);
    }

    public function exercises()
    {
        return $this->belongsToMany(Exercise::class, 'routine_exercise');
    }
}
