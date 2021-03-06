<?php

/**
 * Use strict mode.
 */
declare(strict_types=1);


/**
 * Declaration of the models namespace and use of other namespaces.
 */
namespace  App\Tests;
use App\Http\Controllers\BikeController;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use PHPUnit\Framework\TestCase;


/**
 * Test cases for Bike Controller Class.
 */
class BikeControllerTest extends TestCase
{
    use DatabaseTransactions;

    protected object $bikeController;


    /**
     * @description setUp for test suit. Each test case will run this at first.
     */
    final protected function setUp(): void
    {
        $this->bikeController = new BikeController();
    }


    /**
     * @description tearDown for test suit. Each test case will run this when done is done.
     */
    final protected function tearDown(): void
    {
        parent::tearDown(); // TODO: Change the autogenerated stub
    }


    /**
     * @test
     * @description Test existence of methods for Bike Controller class.
     */
    final public function test_BikeController_methods_existence(): void
    {
        /* Test existence of expected class methods */
        $this->assertTrue(method_exists($this->bikeController, "getBikes"), "Bike Controller Class does not have expected method to get all bikes.");
        $this->assertTrue(method_exists($this->bikeController, "getBike"), "Bike Controller Class does not have expected method to get specific bike.");
        $this->assertTrue(method_exists($this->bikeController, "getBikesInCity"), "Bike Controller Class does not have expected method to get bikes in city.");
        $this->assertTrue(method_exists($this->bikeController, "createBike"), "Bike Controller Class does not have expected method to create bike in database.");
        $this->assertTrue(method_exists($this->bikeController, "updateBike"), "Bike Controller Class does not have expected method to update bike in database.");
        $this->assertTrue(method_exists($this->bikeController, "deleteBike"), "Bike Controller Class does not have expected method to delete bike from database.");
    }


//    /**
//     * @test
//     * @description Test existence of methods for Bike Controller class.
//     */
//    final public function test_BikeController_methods_response_code(): void
//    {
//        /* Test response from class methods */
//        $getResponse = $this->bikeController->getBikes();
//        $getResponse->assertStatus(200);
//    }
}
