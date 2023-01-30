<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    //### Properties
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'surname',
        'email',
        'hash'
    ];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'hash' => '0'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'remember_token'
    ];


    //### Relationships
    //Relationship with GeneralPresentationDecision
    public function generalPresentationDecision(){
        return $this->hasMany(GeneralPresentationDecision::class, 'user_id');
    }

    //Relationship with ProfessionalFieldDecision
    public function professionalFieldDecision(){
        return $this->hasMany(ProfessionalFieldDecision::class, 'user_id');
    }

}
