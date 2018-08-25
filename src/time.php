<?php

namespace Tool;

class Time
{
    static function time()
    {
        return time();
    }

    static function dateFormat($time, $format = 'Y-m-d H:i:s')
    {
        return date($format, $time);
    }

    /**
     * @param bool $bool 是否为时间戳
     * @param string $dateFormat
     * @return false|int|string
     */
    static function now($bool = true, $dateFormat = 'Y-m-d')
    {
        if ($bool) {
            return self::time();
        }
        return self::dateFormat($dateFormat, self::time());
    }

    static function today($bool = true)
    {
        //php获取今日开始时间戳和结束时间戳
        $array = [];
        $beginToday = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
        $endToday = mktime(0, 0, 0, date('m'), date('d') + 1, date('Y')) - 1;
        if ($bool) {
            $array = [
                'begin' => $beginToday,
                'end' => $endToday
            ];
            return $array;
        }
        $array = [
            'begin' => self::dateFormat($beginToday),
            'end' => self::dateFormat($endToday)
        ];
        return $array;
    }

    static function thisWeek($bool = true)
    {
        $array = [];
        $brgin = mktime(0, 0, 0, date("m"), date("d") - date("w") + 1, date("Y"));
        $end = mktime(0, 0, 0, date("m"), date("d") - date("w") + 7, date("Y"));
        if ($bool) {
            $array = [
                'begin' => $brgin,
                'end' => $end
            ];
            return $array;
        }
        $array = [
            'begin' => self::dateFormat($brgin),
            'end' => self::dateFormat($end)
        ];
        return $array;
    }

    static function yesToday($bool = true)
    {
        $array = [];
        $beginYesToday = mktime(0, 0, 0, date('m'), date('d') - 1, date('Y'));
        $endYesToday = mktime(23, 59, 59, date('m'), date('d') - 1, date('Y'));
        if ($bool) {
            $array = [
                'begin' => $beginYesToday,
                'end' => $endYesToday
            ];
            return $array;
        }
        $array = [
            'begin' => self::dateFormat($beginYesToday),
            'end' => self::dateFormat($endYesToday)
        ];
        return $array;
    }

    static function thisMonth($bool = true)
    {
        $array = [];
        $beginThismonth = mktime(0, 0, 0, date('m'), 1, date('Y'));
        $endThismonth = mktime(23, 59, 59, date('m'), date('t'), date('Y'));
        if ($bool) {
            $array = [
                'begin' => $beginThismonth,
                'end' => $endThismonth
            ];
            return $array;
        }
        $array = [
            'begin' => self::dateFormat($beginThismonth),
            'end' => self::dateFormat($endThismonth)
        ];
        return $array;
    }

    static function thisYear($bool = true)
    {
        $array = [];
        $begin = mktime(0, 0, 0, 1, 1, date('Y'));
        $end = mktime(23, 59, 59, 12, 31, date('Y'));
        if ($bool) {
            $array = [
                'begin' => $begin,
                'end' => $end
            ];
            return $array;
        }
        $array = [
            'begin' => self::dateFormat($begin),
            'end' => self::dateFormat($end)
        ];
        return $array;
    }

    /**
     * 当前微妙数
     * @return number
     */
    static function microTime()
    {
        list ($usec, $sec) = explode(" ", microtime());
        return ((( float )$usec + ( float )$sec));
    }
}