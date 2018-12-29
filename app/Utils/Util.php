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

    /**
     * 获取本次请求的ip
     * @return string
     */
    public static function getIp(): string
    {
        $request = request();
        $ip = "unknown";
        if ($request->getHeaderLine('HTTP_CLIENT_IP') && strcasecmp($request->getHeaderLine('HTTP_CLIENT_IP'), "unknown")) {
            $ip = $request->getHeaderLine('HTTP_CLIENT_IP');
        }else if ($request->getHeaderLine('HTTP_X_FORWARDED_FOR') && strcasecmp($request->getHeaderLine('HTTP_X_FORWARDED_FOR'), "unknown")){
            $ip = $request->getHeaderLine('HTTP_X_FORWARDED_FOR');
        }else if ($request->getHeaderLine('REMOTE_ADDR') && strcasecmp($request->getHeaderLine('REMOTE_ADDR'), "unknown")){
            $ip = $request->getHeaderLine('REMOTE_ADDR');
        }
        return $ip;
    }


}
