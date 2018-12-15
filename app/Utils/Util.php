<?php

namespace App\Utils;

/**
 * Created by PhpStorm.
 * User: wanglin
 * Date: 2018/10/30
 * Time: 14:21.
 */
class Util
{
    /**
     * 生成随机数.
     *
     * @param int $length
     *
     * @return string
     */
    public static function randStr($length = 8): string
    {
        $str = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $rand_str = '';
        for ($i = 0; $i < $length; ++$i) {
            $rand_str .= $str[mt_rand(0, strlen($str) - 1)];
        }

        return $rand_str;
    }
}
