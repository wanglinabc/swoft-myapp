<?php
/**
 * Created by PhpStorm.
 * User: wanglin
 * Date: 2019/1/18
 * Time: 16:28
 */

namespace App\Bean\RateLimit\Collector;
use App\Bean\RateLimit\Annotation\RateLimit;
use Swoft\Bean\CollectorInterface;

class RateLimitCollector implements CollectorInterface
{

    protected static $collect=[];
    /**
     * @param string $className
     * @param object|null $objectAnnotation
     * @param string $propertyName
     * @param string $methodName
     * @param null $propertyValue
     * @return mixed
     */
    public static function collect(string $className,
                                   $objectAnnotation = null,
                                   string $propertyName = '',
                                   string $methodName = '',
                                   $propertyValue = null)
    {
         if(isset($objectAnnotation) && $objectAnnotation instanceof RateLimit && !empty($methodName))
         {
             self::$collect[$className][$methodName]=$objectAnnotation;
         }
    }

    /**
     * @return mixed
     */
    public static function getCollector()
    {
        return self::$collect;
    }
}