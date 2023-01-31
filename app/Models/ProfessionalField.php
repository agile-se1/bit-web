<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static where(string $string, mixed $professionalFieldDecision1)
 * @method static orderBy(string $string)
 * @property mixed $current_count
 * @property mixed $max_count
 */
class ProfessionalField extends Model
{
    use HasFactory;

    ///### Properties
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'current_count' => 0,
        'max_count' => 30
    ];

    //### Relationships
    //Relationship with ProfessionalFieldDecision
    public function professionalFieldDecision(): HasMany
    {
        return $this->hasMany(ProfessionalFieldDecision::class, 'professional_field_id');
    }
}
