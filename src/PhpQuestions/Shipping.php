<?php


namespace App\PhpQuestions;


use DateInterval;
use DateTime;
use DateTimeZone;
use Exception;

/**
 * Class Shipping
 * @package App\PhpQuestions
 */
class Shipping
{
    /** @var DateTime $orderDate */
    private $orderDate;

    /**
     * Shipping constructor.
     * @param string $orderDate
     * @throws Exception
     */
    public function __construct(string $orderDate)
    {
        $this->orderDate = date_create_from_format(
            'Y-m-d H:i:s',
            $orderDate,
            new DateTimeZone('Australia/Sydney')
        );
        if (false === $this->orderDate) {
            throw new Exception('Invalid DateTime format');
        }
    }

    /**
     * @return string
     * @throws Exception
     */
    public function getDeliveryDate()
    {
        $deliveryDaysNeed = 2; // dispatch day exclusive
        $deliveryDate = date_create_from_format('Y-m-d', $this->getDispatchDate());

        while ($deliveryDaysNeed > 0) {
            $deliveryDate->add(new DateInterval('P1D'));
            if (true === $this->isBusinessDay($deliveryDate)) {
                $deliveryDaysNeed--;
            }
        }

        return $deliveryDate->format('Y-m-d');
    }

    /**
     * @return string
     * @throws Exception
     */
    public function getDispatchDate()
    {
        $dispatchDate = $this->orderDate;
        if ($dispatchDate->format('H') >= 16) {
            $dispatchDate->add(new DateInterval('P1D'));
        }
        while (false === $this->isBusinessDay($dispatchDate)) {
            $dispatchDate->add(new DateInterval('P1D'));
        }
        return $dispatchDate->format('Y-m-d');
    }

    /**
     * @param string $year
     * @return DateTime
     * @throws Exception
     */
    private function getNewYearDayByYear(string $year)
    {
        $newYearDay = date_create_from_format('Y-m-d', $year . '-01-01');
        return $this->skipWeekend($newYearDay);
    }

    /**
     * @param DateTime $day
     * @return DateTime
     * @throws Exception
     */
    private function skipWeekend(DateTime $day)
    {
        while ($day->format('N') > 5) {
            $day->add(new DateInterval('P1D'));
        }
        return $day;
    }

    /**
     * @param string $year
     * @return DateTime
     * @throws Exception
     */
    private function getAustraliaDayByYear(string $year)
    {
        $australiaDay = date_create_from_format('Y-m-d', $year . '-01-26');
        return $this->skipWeekend($australiaDay);
    }

    /**
     * @param string $year
     * @return DateTime
     * @throws Exception
     */
    private function getGoodFridayByYear(string $year)
    {
        return $this->getEasterMondayByYear($year)->sub(new DateInterval('P3D'));
    }

    /**
     * @param string $year
     * @return DateTime|null
     */
    private function getEasterMondayByYear(string $year)
    {
        try {
            $easter_day = date_create_from_format('Y-m-d', '2019-03-21')
                ->add(new DateInterval('P' . easter_days((int)$year) . 'D'));
            return $easter_day;
        } catch (Exception $e) {
            // TODO add logger to trigger the alarm
        }
        return null;
    }

    /**
     * @param string $year
     * @return DateTime|false
     */
    private function getAnzacDay(string $year)
    {
        return date_create_from_format('Y-m-d', $year . '-04-25');
    }

    /**
     * @param string $year
     * @return DateTime|false
     */
    private function getQueensBirthdayByYear(string $year)
    {
        return date_create_from_format('Y-m-d', date('Y-m-d', strtotime('second monday ' . $year . '-06')));
    }

    /**
     * @param string $year
     * @return DateTime|false
     */
    private function getLabourDayByYear(string $year)
    {
        return date_create_from_format('Y-m-d', date('Y-m-d', strtotime('first monday ' . $year . '-10')));
    }

    /**
     * @param string $year
     * @return DateTime
     * @throws Exception
     */
    private function getChristmasDay(string $year)
    {
        $christmasDay = date_create_from_format('Y-m-d', $year . '-12-25');
        return $this->skipWeekend($christmasDay);
    }

    /**
     * @param string $year
     * @return DateTime
     * @throws Exception
     */
    private function getBoxingDay(string $year)
    {
        $boxingDay = date_create_from_format('Y-m-d', $year . '-12-26');
        return $this->skipWeekend($boxingDay);
    }

    /**
     * @param DateTime $dateToCheck
     * @return bool
     * @throws Exception
     */
    private function isBusinessDay(DateTime $dateToCheck)
    {
        if ($dateToCheck->format('N') > 5) {
            return false;
        }
        switch (true) {
            case $dateToCheck->format('Ymd') == $this->getNewYearDayByYear($dateToCheck->format('Y'))->format('Ymd'):
            case $dateToCheck->format('Ymd') == $this->getAustraliaDayByYear($dateToCheck->format('Y'))->format('Ymd'):
            case $dateToCheck->format('Ymd') == $this->getGoodFridayByYear($dateToCheck->format('Y'))->format('Ymd'):
            case $dateToCheck->format('Ymd') == $this->getEasterMondayByYear($dateToCheck->format('Y'))->format('Ymd'):
            case $dateToCheck->format('Ymd') == $this->getAnzacDay($dateToCheck->format('Y'))->format('Ymd'):
            case $dateToCheck->format('Ymd') == $this->getQueensBirthdayByYear($dateToCheck->format('Y'))->format('Ymd'):
            case $dateToCheck->format('Ymd') == $this->getLabourDayByYear($dateToCheck->format('Y'))->format('Ymd'):
            case $dateToCheck->format('Ymd') == $this->getChristmasDay($dateToCheck->format('Y'))->format('Ymd'):
            case $dateToCheck->format('Ymd') == $this->getBoxingDay($dateToCheck->format('Y'))->format('Ymd'):
                return false;
            default:
                return true;
        }
    }
}