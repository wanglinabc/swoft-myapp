<?php
/**
 * Created by PhpStorm.
 * User: wanglin
 * Date: 2018/12/27
 * Time: 18:03
 */

namespace App\Bean\RateLimit\Bootstrap;


use App\Bean\RateLimit\Bean\Annotation\RateLimit;
use App\Utils\SysCode;
use App\Utils\Util;
use Swoft\Bean\Annotation\Bean;
use Swoft\Http\Message\Server\Request;
use App\Utils\RedisKeys;

/**
 * Class RateLimitHander
 * @package App\Bean\RateLimit
 * @Bean("RateLimit")
 */
class RateLimitHander implements HanderInterface
{

    /**
     * @param Request $request
     * @throws
     */
    public function beforeHandle(Request $request,RateLimit $rateLimit)
    {
       $result=cache()->get(RedisKeys::RATE_LIMITS.Util::getIp());
       if($result){
           error_exit(SysCode::REQUEST_LIMIT_ERROR,"该接口请求频率为".$rateLimit->getLimit().'一次');
       }
    }

    public function afterHandle(Request $request,RateLimit $rateLimit)
    {
        $result=cache()->get(RedisKeys::RATE_LIMITS.Util::getIp());
        if(!$result){
            cache()->set(RedisKeys::RATE_LIMITS.Util::getIp(),1,$rateLimit->getLimit());
        }
    }
}