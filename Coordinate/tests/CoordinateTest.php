<?php

/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 16/9/19
 * Time: 上午10:05
 */
class CoordinateTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var
     */
    public $coordinate;

    public function setUp()
    {
        $this->coordinate = new \Loktarjugg\Coordinate\Coordinate(new \GuzzleHttp\Client());
    }

    /**
     * test_shanghai
     */
    public function test_it_City_in_the_shanghai()
    {

        $test = $this->coordinate->Coordinate(urlencode('上海市'));

        $this->assertEquals('121.4737,31.23037',$test);
    }
}