<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, mixed $id)
 * @method static create(array $array)
 */
class ProfessionalFieldDecision extends Model
{
    use HasFactory;

    ///### Properties
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'professional_field_id',
    ];
}
