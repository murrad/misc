<?php

use PHPUnit\Framework\TestCase;
use Battot\Misc\Holiday;

class HolidayTest extends TestCase
{
    /**
     * @dataProvider  newYearTestProvider
     */
    public function test_a_new_year_date($year, $date)
    {
        $this->assertEquals(Holiday::getNewYearHoliday($year), $date);
    }

    /**
     * @dataProvider  easterTestProvider
     */
    public function test_easter_sunday_date($year, $date)
    {
        $this->assertEquals(Holiday::getEasterSunday($year), $date);
    }

    /**
     * @dataProvider  goodFridayTestProvider
     */
    public function test_good_friday_date($year, $date)
    {
        $this->assertEquals(Holiday::getGoodFriday($year), $date);
    }
    
    /**
     * @dataProvider  easterMondayTestProvider
     */
    public function test_easter_monday_date($year, $date)
    {
        $this->assertEquals(Holiday::getEasterMonday($year), $date);
    }

    /**
     * @dataProvider  earlyMayBankHolidayTestProvider
     */
    public function test_early_may_bank_holiday_date($year, $date)
    {
        $this->assertEquals(Holiday::getEarlyMayBankHoliday($year), $date);
    }

    /**
     * @dataProvider  springBankHolidayTestProvider
     */
    public function test_spring_bank_holiday_date($year, $dates)
    {
        $this->assertEquals(Holiday::getSpringBankHoliday($year), $dates);
    }

    /**
     * @dataProvider  summerBankHolidayTestProvider
     */
    public function test_summer_bank_holiday_date($year, $date)
    {
        $this->assertEquals(Holiday::getSummerBankHoliday($year), $date);
    }

    /**
     * @dataProvider  christmasHolidayTestProvider
     */
    public function test_christmas_holiday_date($year, $date)
    {
        $this->assertEquals(Holiday::getChristmasDayHoliday($year), $date);
    }

    /**
     * @dataProvider  boxingDayHolidayTestProvider
     */
    public function test_boxing_day_holiday_date($year, $date)
    {
        $this->assertEquals(Holiday::getBoxingDayHoliday($year), $date);
    }

    /**
     * @dataProvider  allPublicBankHolidaysTestProvider
     */
    public function test_all_public_bank_holidays_date($year, $dates)
    {
        $this->assertEquals(Holiday::getAllPublicAndBankHolidayByYear($year), $dates);
    }

    public function newYearTestProvider()
    {
        return [
            [1970, '1970-01-01'],
            [2000, '2000-01-03'],
            [2017, '2017-01-02']
        ];
    }

    public function easterTestProvider()
    {
        return [
            [2019, '2019-04-21'],
            [1975, '1975-03-30'],
            [1990, '1990-04-15']
        ];
    }

    public function goodFridayTestProvider()
    {
        return [
            [2019, '2019-04-19'],
            [1975, '1975-03-28'],
            [1990, '1990-04-13']
        ];
    }

    public function easterMondayTestProvider()
    {
        return [
            [2019, '2019-04-22'],
            [1975, '1975-03-31'],
            [1990, '1990-04-16']
        ];
    }

    public function earlyMayBankHolidayTestProvider()
    {
        return [
            [2019, '2019-05-06'],
            [2012, '2012-05-07'],
            [1990, '1990-05-07']
        ];
    }

    public function springBankHolidayTestProvider()
    {
        return [
            [1980, ['1980-05-26']],
            [2002, ['2002-06-03', '2002-06-04']],
            [1999, ['1999-05-31']]
        ];
    }

    public function summerBankHolidayTestProvider()
    {
        return [
            [2010, '2010-08-30'],
            [2000, '2000-08-28'],
            [1994, '1994-08-29']
        ];
    }

    public function christmasHolidayTestProvider()
    {
        return [
            [2010, '2010-12-28'],
            [2000, '2000-12-25'],
            [1994, '1994-12-27']
        ];
    }

    public function boxingDayHolidayTestProvider()
    {
        return [
            [2010, '2010-12-27'],
            [2000, '2000-12-26'],
            [1994, '1994-12-26']
        ];
    }

    public function allPublicBankHolidaysTestProvider()
    {
        return [
            [
                1985, 
                [
                    '1985-01-01',
                    '1985-04-05',
                    '1985-04-08',
                    '1985-05-06',
                    '1985-05-27',
                    '1985-08-26',
                    '1985-12-25',
                    '1985-12-26'
                ]
            ],
            [
                2005, 
                [
                    '2005-01-03',
                    '2005-03-25',
                    '2005-03-28',
                    '2005-05-02',
                    '2005-05-30',
                    '2005-08-29',
                    '2005-12-27',
                    '2005-12-26'
                ]
            ]
        ];
    }
}
