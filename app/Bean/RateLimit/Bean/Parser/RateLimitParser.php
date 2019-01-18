<?php

namespace App\Bean\RateLimit\Bean\Parser;

use Swoft\Bean\Parser\AbstractParser;
use App\Bean\RateLimit\Bean\Collector\RateLimitCollector;

/**
 * Controller parser
 */
class RateLimitParser extends AbstractParser
{
    /**
     * @param string      $className
     * @param string      $propertyName
     * @param string      $methodName
     * @param string|null $propertyValue
     *
     * @return void
     */
    public function parser(string $className, $objectAnnotation = null, string $propertyName = '', string $methodName = '', $propertyValue = null): void
    {
        RateLimitCollector::collect($className, $objectAnnotation, $propertyName, $methodName, $propertyValue);
    }
}
