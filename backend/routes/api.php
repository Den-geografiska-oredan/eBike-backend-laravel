<?php

/**
 * Declared namespaces in use.
 */

use App\Http\Controllers\TravelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BikeController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\StationController;
use App\Http\Controllers\ParkingZoneController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


/**
 * Index route.
 */
Route::get('/', function () {
    return [
        'Index' => "/   (this route)",
        'GET All bikes' => "/bike",
        'GET Bike by bike_id' => "/bike/bike_id",
        'GET All bikes in city by city_id' => "/bike/city/city_id",
        'POST Create new bike' => "/bike",
        'PUT Update bike by bike_id' => "/bike",
        'DELETE Bikes by bike_id' => "/bike",

        'GET All cities' => "/city",
        'GET A city by city_id' => "/city/city_id",
        'POST Add a city' => "/city",
        'PUT Update a city by city_id' => "/city",
        'DELETE A city by city_id' => "/city",

        'GET All stations' => "/station",
        'GET A station by station_id' => "/station/station_id",
        'GET All stations in city by city_id' => "/station/city/city_id",
        'POST Add new station' => "/station",
        'PUT Update a station by station_id' => "/station",
        'DELETE A station by station_id' => "/station",

        'GET Travels route' => "/station",
        'GET Travel route by travel ID' => "/station/station_id",
        'POST Travels route' => "/station",
        'PUT Travels route' => "/station",
        'DELETE Travels route' => "/station",

        'GET Users route' => "/user",
        'GET User route' => "/user/user_id",
        'POST Users route' => "/user",
        'PUT Users route' => "/user",
        'DELETE Users route' => "/user"
    ];
});


///**
// * Authentication Route.
// */
//Route::get('/auth/github', [AuthenticationController::class, 'redirectToProvider']);
//Route::get('/auth/github/callback', [AuthenticationController::class, 'providerCallback']);


/**
 * Bike routes.
 * @description Routes are for handling database requests relevant to bikes. Full CRUD supported.
 */
Route::get('/bike', [BikeController::class, 'getBikes']);
Route::get('/bike/{bike:_id}', [BikeController::class, 'getBike']);
Route::get('/bike/city/{city:name}', [BikeController::class, 'getBikesInCity']);
Route::post('/bike', [BikeController::class, 'createBike']);
Route::put('/bike', [BikeController::class, 'updateBike']);
Route::delete('/bike', [BikeController::class, 'deleteBike']);


/**
 * City routes.
 * @description Routes are for handling database requests relevant to cities. Full CRUD supported.
 */
Route::get('/city', [CityController::class, 'getCities']);
Route::get('/city/{city:name}', [CityController::class, 'getCity']);
Route::post('/city', [CityController::class, 'addCity']);
Route::put('/city', [CityController::class, 'updateCity']);
Route::delete('/city', [CityController::class, 'deleteCity']);


/**
 * Parking Zone routes.
 * @description Routes are for handling database requests relevant to parking zones. Full CRUD supported.
 */
Route::get('/parking', [ParkingZoneController::class, 'getParingZones']);
Route::get('/parking/{parking:_id}', [ParkingZoneController::class, 'getParingZone']);
Route::get('/parking/city/{city:name}', [ParkingZoneController::class, 'getParkingZonesInCity']);
Route::post('/parking', [ParkingZoneController::class, 'createParkingZone']);
Route::put('/parking', [ParkingZoneController::class, 'updateParkingZone']);
Route::delete('/parking', [ParkingZoneController::class, 'deleteParkingZone']);


/**
 * Station routes.
 * @description Routes are for handling database requests relevant to station. Full CRUD supported.
 */
Route::get('/station', [StationController::class, 'getStations']);
Route::get('/station/{station:_id}', [StationController::class, 'getStation']);
Route::get('/station/city/{city:name}', [StationController::class, 'getStationsInCity']);
Route::post('/station', [StationController::class, 'createStation']);
Route::put('/station', [StationController::class, 'updateStation']);
Route::delete('/station', [StationController::class, 'deleteStation']);


/**
 * Travel Routes.
 * @description Routes are for handling database requests relevant to travels. Full CRUD supported.
 */
Route::get('/travel', [TravelController::class, 'getTravels']);
Route::get('/travel/{travel}', [TravelController::class, 'getTravels']);
Route::get('/travel/city/{city:name}', [TravelController::class, 'getTravelingInCity']);
Route::get('/travel/bike/{bike:_id}', [TravelController::class, 'getTravelingWithBike']);
Route::get('/travel/user/{user:_id}', [TravelController::class, 'getTravelingByUser']);
Route::post('/travel', [TravelController::class, 'createTravel']);
Route::put('/travel', [TravelController::class, 'updateTravel']);
Route::delete('/travel', [TravelController::class, 'deleteTravel']);


/**
 * User Routes.
 * @description Routes are for handling database requests relevant to users. Full CRUD supported.
 */
Route::get('/user', [UserController::class, 'getUsers']);
Route::get('/user/{user:_id}', [UserController::class, 'getUser']);
Route::get('/user/city/{city:name}', [UserController::class, 'getUsersInCity']);
Route::post('/user', [UserController::class, 'createUser']);
Route::put('/user', [UserController::class, 'updateUser']);
Route::delete('/user', [UserController::class, 'deleteUser']);
