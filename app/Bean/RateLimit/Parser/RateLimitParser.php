<?php
/**
 * Created by PhpStorm.
 * User: wanglin
 * Date: 2019/1/18
 * Time: 16:26
 */

namespace App\Bean\RateLimit\Parser;


use App\Bean\RateLimit\Annotation\RateLimit;
use App\Bean\RateLimit\Collector\RateLimitCollector;
use Swoft\Bean\Parser\AbstractParser;

class RateLimitParser extends AbstractParser
{

    /**
     * 解析注解
     *
     * @param string $className
     * @param object $objectAnnotation
     * @param string $propertyName
     * @param string $methodName
     * @param string|null $propertyValue
     *
     * @return mixed
     */
    public function parser(string $className,
                           $objectAnnotation = null,
                           string $propertyName = '',
                           string $methodName = '',
                           $propertyValue = null)
    {
      if(isset($objectAnnotation) && $objectAnnotation instanceof RateLimit && !empty($methodName))
      {
          RateLimitCollector::collect($className,$objectAnnotation,$propertyName,$methodName,$propertyValue);
      }
    }
}