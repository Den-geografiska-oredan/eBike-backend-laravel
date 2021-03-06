<?php

/**
 * Declaration of the models namespace and use of other namespaces.
 */
namespace App\Models;
use Illuminate\Database\Eloquent\Model as Eloquent; // MySQL
//use Jenssegers\Mongodb\Eloquent\Model as Eloquent; // MongoDB
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


/**
 * Model for ParkingZone.
 * Defines primary keys and the relations to other data models.
 * Enables/disables mass assigning columns in collections.
 */
class ParkingZone extends Eloquent
{
    use HasFactory;


    /**
     * @description Models database connection.
     * @var string
     */
    protected string $database = 'mysql';


    /**
     * PrimaryKey is the collections primary key.
     * Guarded are the attributes that are guarded from mass assignable.
     * Fillable are attributes that are mass assignable.
     * Cast are the attributes that should be type cast.
     */
    protected $primaryKey = "_id";
    protected $guarded = [ "_id" ];
    protected $casts = [ "_id" => "integer" ];
    protected $fillable = [
        'city',
        'sw_longitude',
        'sw_latitude',
        'se_longitude',
        'se_latitude',
        'ne_longitude',
        'ne_latitude',
        'nw_longitude',
        'nw_latitude'
    ];


    /**
     * @method city()
     * @description Relation mapping, a parking zone belong to a city.
     * @return BelongsTo
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, '_id', 'name');
    }


    /**
     * @method parkedBike()
     * @description Relation mapping, a parking zone has many parkedBike.
     * @return HasMany
     */
    public function parkedBike(): HasMany
    {
        return $this->hasMany(ParkedBike::class, '_id');
    }
}
