<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Response;


/**
 * User Controller class.
 * Request data related to Bike class.
 */
class UserController extends Controller
{
    /**
     * @method getUsers()
     * @description Getter method to request all users from database.
     * @return string
     */
    final public function getUsers(): string
    {
        $data = [
            'users' => User::with('city')->get()
        ];

        return json_encode($data);
    }


    /**
     * @method getUser()
     * @description Getter method to return specific user from database.
     * @param User $user
     * @return string
     */
    final public function getUser(User $user): string
    {
        return json_encode($user);
    }


    /**
     * @method getUsersInCity()
     * @description Getter method to return bikes in specific city.
     * @param City $city
     * @return string
     */
    final public function getUsersInCity(City $city): string
    {
        $data = [
            'users' => $city->users
        ];

        return json_encode($data);
    }


    /**
     * @method createUser()
     * @description Setter method to create a new user. Validates input json
     *
     */
    final public function createUser(Request $request)
    {
        $attributes = $request->validate([
            'firstname' => ['required', 'min:2', 'max:255'],
            'lastname' => ['required', 'min:2', 'max:255'],
            'adress' => ['required', 'min:2', 'max:255'],
            'postcode' => ['required', 'min:5', 'max:6'],
            'city_id' => ['required'],
            'phone' => ['required'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'min:8', 'max:50']
        ]);

        $attributes["password"] = bcrypt($attributes["password"]);

        User::create($attributes);
    }
}
