<?php


namespace Tests\Unit;


use App\PhpQuestions\Shipping;
use Exception;
use PHPUnit\Framework\TestCase;

class ShippingTest extends TestCase
{
    /**
     * @dataProvider dispatchDateProvider
     * @param $orderDate
     * @param $dispatchDate
     * @throws Exception
     */
    public function testDispatchDate($orderDate, $dispatchDate)
    {
        $this->assertEquals($dispatchDate, (new Shipping($orderDate))->getDispatchDate());
    }

    /**
     * @dataProvider deliveryDateProvider
     * @param $orderData
     * @param $deliveryDate
     * @throws Exception
     */
    public function testDeliveryDate($orderData, $deliveryDate)
    {
        $this->assertEquals($deliveryDate, (new Shipping($orderData))->getDeliveryDate());
    }

    /**
     * @return array
     */
    public function dispatchDateProvider()
    {
        return [
            ['2000-01-03 15:59:59', '2000-01-04'], // test provided is WRONG, 2000-01-03 is public holiday!
            ['2000-01-03 16:00:00', '2000-01-04'],
            ['2019-08-11 13:00:00', '2019-08-12'],
            ['2019-01-01 13:00:00', '2019-01-02'],
            ['2019-12-25 12:00:00', '2019-12-27'],
        ];
    }

    /**
     * @return array
     */
    public function deliveryDateProvider()
    {
        return [
            ['2000-01-03 15:59:59', '2000-01-06'], // test case provided is WRONG, 2000-01-03 is public holiday!
            ['2000-01-03 16:00:00', '2000-01-06'],
            ['2019-08-11 13:00:00', '2019-08-14'],
            ['2019-01-01 13:00:00', '2019-01-04'],
            ['2019-12-25 12:00:00', '2019-12-31'],
        ];
    }
}