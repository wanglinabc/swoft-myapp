<?php
/**
 * Created by PhpStorm.
 * User: wanglin
 * Date: 2018/12/27
 * Time: 18:03
 */

namespace App\Bean\RateLimit\Bootstrap;


use App\Bean\RateLimit\Bean\Annotation\RateLimit;
use Swoft\Http\Message\Server\Request;

interface HanderInterface
{
    /**
     * 请求前执行逻辑
     * @param Request $request
     * @param RateLimit $rateLimit
     * @return mixed
     */
    public function beforeHandle(Request $request,RateLimit $rateLimit);

    /**
     * 请求后执行逻辑
     * @param Request $request
     * @param RateLimit $rateLimit
     * @return mixed
     */
    public function afterHandle(Request $request,RateLimit $rateLimit);

}