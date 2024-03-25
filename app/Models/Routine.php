<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Routine extends Model
{
    use HasFactory;

    /**
     * ROUTINE ATTRIBUTES
     * $this->attributes['id'] - int - contains the routine primary key (id)
     * $this->attributes['type'] - string - contains the  routine type
     * $this->attributes['trainingcontext_id'] - int - contains the routine trainingcontext_id
     */

    protected $fillable = [
        'type',
        'trainingcontext_id',
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

    public function getTrainingcontextId(): int
    {
        return $this->attributes['trainingcontext_id'];
    }

    public function setTrainingcontextId(int $trainingcontext_id): void
    {
        $this->attributes['trainingcontext_id'] = $trainingcontext_id;
    }

    public function trainingcontext(): BelongTo
    {
        return $this->belongsTo(Trainingcontext::class);
    }

    public function exercises(): HasMany
    {
        return $this->hasMany(Exercise::class);
    }
}
