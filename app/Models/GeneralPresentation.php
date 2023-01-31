<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static orderBy(string $string)
 */
class GeneralPresentation extends Model
{
    use HasFactory;

    //### Properties
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
        'description'
    ];

    //### Relationships
    //Relationship with GeneralPresentationDecision
    public function generalPresentationDecision(){
        return $this->hasMany(GeneralPresentationDecision::class, 'general_presentation_id');
    }

}
