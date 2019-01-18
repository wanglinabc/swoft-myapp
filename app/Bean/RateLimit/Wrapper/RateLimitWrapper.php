<?php
/**
 * Created by PhpStorm.
 * User: wanglin
 * Date: 2019/1/18
 * Time: 16:18
 */

namespace App\Bean\RateLimit\Wrapper;


use App\Bean\RateLimit\Annotation\RateLimit;
use Swoft\Bean\Wrapper\AbstractWrapper;

class RateLimitWrapper extends AbstractWrapper
{

    protected $methodAnnotations = [
        RateLimit::class
    ];

    /**
     * 是否解析类注解
     *
     * @param array $annotations
     * @return bool
     */
    public function isParseClassAnnotations(array $annotations): bool
    {
        return false;
    }

    /**
     * 是否解析属性注解
     *
     * @param array $annotations
     * @return bool
     */
    public function isParsePropertyAnnotations(array $annotations): bool
    {
        return false;
    }

    /**
     * 是否解析方法注解
     *
     * @param array $annotations
     * @return bool
     */
    public function isParseMethodAnnotations(array $annotations): bool
    {
        return true;
    }
}