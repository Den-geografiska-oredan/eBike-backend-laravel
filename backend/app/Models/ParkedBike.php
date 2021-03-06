<?php

/**
 * Declaration of the models namespace and use of other namespaces.
 */
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


/**
 * @description Model for parked bikes at parking zone.
 */
class ParkedBike extends Model
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
    protected $primaryKey = '_id';
    protected $guarded = [
        '_id',
//        'bike_id',
//        'parking_id',
//        'status'
    ];

    protected $fillable = [
        'bike_id',
        'parking_id',
        'status'
    ];


    /**
     * @method bikes()
     * @description Relation mapping, a parked bike belongs to a bike.
     * @return BelongsTo
     */
    public function bikes(): BelongsTo
    {
        return $this->belongsTo(Bike::class, '_id');
    }


    /**
     * @method parking()
     * @description Relation mapping, a parked bike belongs to a parking.
     * @return BelongsTo
     */
    public function parking(): BelongsTo
    {
        return $this->belongsTo(ParkingZone::class, '_id');
    }
}
