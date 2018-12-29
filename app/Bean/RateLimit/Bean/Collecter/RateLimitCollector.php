<?php

namespace Swoft\Http\Server\Bean\Collector;

use App\Bean\RateLimit\Bean\Annotation\RateLimit;
use Swoft\Bean\CollectorInterface;
/**
 * the collector of controller
 *
 * @uses      RateLimitCollector
 * @version   2018年01月07日
 * @author    stelin <phpcrazy@126.com>
 * @copyright Copyright 2010-2016 swoft software
 * @license   PHP Version 7.x {@link http://www.php.net/license/3_0.txt}
 */
class RateLimitCollector implements CollectorInterface
{
    /**
     * @var array
     */
    private static $RateLimits = [];

    /**
     * @param string $className
     * @param object $objectAnnotation
     * @param string $propertyName
     * @param string $methodName
     * @param null   $propertyValue
     */
    public static function collect(
        string $className,
        $objectAnnotation = null,
        string $propertyName = '',
        string $methodName = '',
        $propertyValue = null
    ) {
        if ($objectAnnotation instanceof RateLimit) {
            self::$RateLimits[$className][$methodName]['annotation'] = $objectAnnotation;
            return;
        }
    }

    /**
     * @return array
     */
    public static function getCollector(): array
    {
        return self::$RateLimits;
    }

}
