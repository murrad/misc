<?php

namespace Battot\Misc;

/**
 * @author Murrad Mohammed <murrad_mohammed@yahoo.com>
 * @version 1.0
 * @package Battot/Misc
 */
/**
 * @package Battot/Misc
 */
class Holiday
{
    /**
     * returns the date of New Year Holiday for specific year(YYYY)
     *
     * @static
     * @param integer $year default 1970
     * @return string date YYYY-MM-DD
     */
    public static function getNewYearHoliday($year = 1970)
    {
        $holiday = "{$year}-01-01";
        $weekDay = date('D', strtotime($holiday));
        //If New year Day falls on Sat/Sun, public holiday on Mon
        if ($weekDay == 'Sun') {
            $holiday = "{$year}-01-02";
        } elseif ($weekDay == 'Sat') {
            $holiday = "{$year}-01-03";
        }

        return $holiday;
    }

    /**
     * returns the date of Easter Sunday for specific year(YYYY)
     *
     * Anonymous Gregorian Algorithm for determining Easter
     * {@link https://en.wikipedia.org/wiki/Computus}
     *
     * @static
     * @param integer $year default 1970
     * @return string date YYYY-MM-DD
     */
    public static function getEasterSunday($year = 1970)
    {
        $A = $year % 19;
        $B = floor($year / 100);
        $C = $year % 100;
        $D = floor($B / 4);
        $E = $B % 4;
        $F = floor(($B + 8) / 25);
        $G = floor(($B - $F + 1) / 3);
        $H = (19 * $A + $B - $D - $G + 15) % 30;
        $I = floor($C / 4);
        $K = $C % 4;
        $L = (32 + 2 * $E + 2 * $I - $K - $H) % 7;
        $M = floor(($A + 11 * $H + 22 * $L) / 451);
        $N = floor(($H + $L - 7 * $M + 114) / 31);
        $N = $N < 10 ? "0{$N}" : $N;
        $O = ($H + $L - 7 * $M + 114) % 31 + 1;
        $O = $O < 10 ? "0{$O}" : $O;

        return "{$year}-{$N}-{$O}";
    }

    /**
     * returns the date of Good Friday for specific year(YYYY)
     *
     * @static
     * @param integer $year default 1970
     * @return string date YYYY-MM-DD
     */
    public static function getGoodFriday($year = 1970)
    {
        // Easter Sunday:
        $easterSunday = Self::getEasterSunday($year);

        return date('Y-m-d', strtotime("{$easterSunday} -2 day"));
    }

    /**
     * returns the date of Easter Monday for specific year(YYYY)
     *
     * @static
     * @param integer $year default 1970
     * @return string date YYYY-MM-DD
     */
    public static function getEasterMonday($year = 1970)
    {
        // Easter Sunday:
        $easterSunday = Self::getEasterSunday($year);

        return date('Y-m-d', strtotime("{$easterSunday} +1 day"));
    }

    /**
     * returns the date of Early May Bank Holiday for specific year(YYYY)
     *
     * @static
     * @param integer $year default 1970
     * @return string date YYYY-MM-DD
     */
    public static function getEarlyMayBankHoliday($year = 1970)
    {
        if ($year == 1995) {
            return '1995-05-08'; //50th anniversary year exception
        }

        $holiday = "{$year}-05-01";

        $weekDay = date('D', strtotime($holiday));

        switch ($weekDay) {
            case 'Tue':
                $holiday = "{$year}-05-07";
                break;
            case 'Wed':
                $holiday = "{$year}-05-06";
                break;
            case 'Thu':
                $holiday = "{$year}-05-05";
                break;
            case 'Fri':
                $holiday = "{$year}-05-04";
                break;
            case 'Sat':
                $holiday = "{$year}-05-03";
                break;
            case 'Sun':
                $holiday = "{$year}-05-02";
                break;
        }

        return $holiday;
    }

    /**
     * returns the date(s) of Spring Bank Holiday for specific year(YYYY)
     *
     * @static
     * @param integer $year default 1970
     * @return array of string (date YYYY-MM-DD)
     */
    public static function getSpringBankHoliday($year = 1970)
    {
        if ($year == 2002) { // 2002 exception year
            return ['2002-06-03', '2002-06-04'];
        }

        $holiday = "{$year}-05-31";

        $weekDay = date('D', strtotime($holiday));

        switch ($weekDay) {
            case 'Tue':
                $holiday = "{$year}-05-30";
                break;
            case 'Wed':
                $holiday = "{$year}-05-29";
                break;
            case 'Thu':
                $holiday = "{$year}-05-28";
                break;
            case 'Fri':
                $holiday = "{$year}-05-27";
                break;
            case 'Sat':
                $holiday = "{$year}-05-26";
                break;
            case 'Sun':
                $holiday = "{$year}-05-25";
                break;
        }

        return [$holiday];
    }

    /**
     * returns the date of Summer Bank Holiday for specific year(YYYY)
     *
     * @static
     * @param integer $year default 1970
     * @return string date YYYY-MM-DD
     */
    public static function getSummerBankHoliday($year = 1970)
    {
        $holiday = "{$year}-08-31";

        $weekDay = date('D', strtotime($holiday));
        switch ($weekDay) {
            case 'Tue':
                $holiday = "{$year}-08-30";
                break;
            case 'Wed':
                $holiday = "{$year}-08-29";
                break;
            case 'Thu':
                $holiday = "{$year}-08-28";
                break;
            case 'Fri':
                $holiday = "{$year}-08-27";
                break;
            case 'Sat':
                $holiday = "{$year}-08-26";
                break;
            case 'Sun':
                $holiday = "{$year}-08-25";
                break;
        }

        return $holiday;
    }

    /**
     * returns the date of Christmas Holiday for specific year(YYYY)
     *
     * @static
     * @param integer $year default 1970
     * @return string date YYYY-MM-DD
     */
    public static function getChristmasDayHoliday($year = 1970)
    {
        $holiday = "{$year}-12-25";
        $weekDay = date('D', strtotime($holiday));
        //If Chrismas Day falls on Sat/Sun, public holiday on Mon/Tue
        if ($weekDay == 'Sat') {
            $holiday = "{$year}-12-28";
        } elseif ($weekDay == 'Sun') {
            $holiday = "{$year}-12-27";
        }

        return $holiday;
    }

    /**
     * returns the date of Boxing Day Holiday for specific year(YYYY)
     *
     * @static
     * @param integer $year default 1970
     * @return string date YYYY-MM-DD
     */
    public static function getBoxingDayHoliday($year = 1970)
    {
        $holiday = "{$year}-12-26";
        $weekDay = date('D', strtotime($holiday));
        //If Boxing Day falls on Sat/Sun, public holiday on Mon/Tue
        if ($weekDay == 'Sun') {
            $holiday = "{$year}-12-27";
        } elseif ($weekDay == 'Sat') {
            $holiday = "{$year}-12-28";
        }

        return $holiday;
    }

    /**
     * Returns all Public and Bank Holidays for specific year(YYYY)
     *
     * @static
     * @param integer $year default 1970
     * @return array of string (date YYYY-MM-DD)
     */
    public static function getAllPublicAndBankHolidayByYear($year = 1970)
    {
        $holidays = [];

        $holidays[] = Self::getNewYearHoliday($year);

        $holidays[] = Self::getGoodFriday($year);
        $holidays[] = Self::getEasterMonday($year);

        $holidays[] = Self::getEarlyMayBankHoliday($year);

        foreach (Self::getSpringBankHoliday($year) as $holidayDate) {
            $holidays[] = $holidayDate;
        }

        $holidays[] = Self::getSummerBankHoliday($year);

        $holidays[] = Self::getChristmasDayHoliday($year);
        $holidays[] = Self::getBoxingDayHoliday($year);

        return $holidays;
    }

    /**
     * Returns a year worth of all Public and Bank Holidays from specific date (YYYY-MM-DD)
     *
     * @static
     * @param string $startDate default 1970-01-01
     * @return array of string (date YYYY-MM-DD)
     */
    public static function calculateBankHolidays($startDate = '1970-01-01')
    {
        $holidays = [];
        $endDate = date('Y-m-d', strtotime("{$startDate} + 1 year - 1 day"));
        $fromYear = date('Y', strtotime($startDate));
        $toYear = date('Y', strtotime($endDate));

        if ($fromYear == $toYear) {
            $holidays = self::getAllPublicAndBankHolidayByYear($fromYear);
        } else {
            $holidaysUpToEndOfTheYear = self::getAllPublicAndBankHolidayByYear($fromYear);
            $holidaysUpToEndDate = self::getAllPublicAndBankHolidayByYear($toYear);
            $holidaysList = array_merge($holidaysUpToEndOfTheYear, $holidaysUpToEndDate);
            foreach ($holidaysList as $holiday) {
                $holidayDate = strtotime($holiday);
                if ($holidayDate >= strtotime($startDate)
                    && $holidayDate <= strtotime($endDate)) {
                    $holidays[] = $holiday;
                }
            }
        }

        return $holidays;
    }
}
