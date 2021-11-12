<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Auth\Authenticatable as AuthenticateTrait;
use Illuminate\Contracts\Auth\Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class User extends Eloquent implements Authenticatable
{
    use AuthenticateTrait;
    use HasApiTokens, HasFactory, Notifiable;


    /**
     * @description Models database connection.
     * @var string
     */
    private string $database = 'mongodb';


    /**
     * The attributes that are guarded from mass assignable.
     */
    protected $guarded = ['_id'];


    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'adress',
        'postcode',
        'city',
        'phone',
        'email',
        'password',
        'payment_method',
        'payment_status'
    ];


    /**
     * The attributes that should be hidden for serialization.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * @method setPasswordAttribute()
     * @description Eloquent Mutator method for hashing all passwords before saving them to database.
     * @param $password
     */
    final public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }


    /**
     * @method city()
     * @description Relation mapping, a user belong to a city.
     * @return BelongsTo
     */
    final public function city(): object
    {
        return $this->belongsTo(City::class);
    }


    /**
     * @method travels()
     * @description Relation mapping, a user has many travels.
     * @return HasMany
     */
    final public function travels(): object
    {
        return $this->hasMany(Travel::class);
    }
}
