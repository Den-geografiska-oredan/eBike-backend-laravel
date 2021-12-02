<?php

/**
 * Use strict mode.
 */
declare(strict_types=1);


/**
 * Declaration of the models namespace and use of other namespaces.
 */
namespace App\Tests;
use App\Models\Bike;
use Prophecy\PhpUnit\ProphecyTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use PHPUnit\Framework\TestCase;


/**
 * Test cases for Bike Model Class.
 */
class BikeModelTest extends TestCase
{
    use HasFactory, ProphecyTrait;

    protected object $bike;


    /**
     * @description setUp for test suit. Each test case will run this at first.
     */
    final protected function setUp(): void
    {
        $this->bike = new Bike();
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
     * @description Test construction method for Bike class. Test instance of namespace and test default value for property faces.
     */
    final public function test_Bike_Model(): void
    {
        /* Test class attributes existence */
        $this->assertObjectHasAttribute("database", $this->bike);
        $this->assertObjectHasAttribute("primaryKey", $this->bike);
        $this->assertObjectHasAttribute("guarded", $this->bike);
        $this->assertObjectHasAttribute("casts", $this->bike);
        $this->assertObjectHasAttribute("fillable", $this->bike);

        /* Test existence of expected class methods */
        $this->assertTrue(method_exists($this->bike, "city"), "Bike Model Class does not have expected relation method for city.");
        $this->assertTrue(method_exists($this->bike, "travels"), "Bike Model Class does not have expected relation method for travels.");
    }


    /**
     * @test
     * @description Test if the Bike class model have a method for city relation.
     */
    final public function test_Bike_model_to_have_method_for_city_relation(): void
    {
        $bike = $this->prophesize(Bike::class);
        $bike->city()->shouldBeCalled();
        $bike->reveal()->city();
    }


    /**
     * @test
     * @description Test if the Bike class model have a method for travels relation.
     */
    final public function test_Bike_model_to_have_method_for_travels_relation(): void
    {
        $bike = $this->prophesize(Bike::class);
        $bike->travels()->shouldBeCalled();
        $bike->reveal()->travels();
    }
}
