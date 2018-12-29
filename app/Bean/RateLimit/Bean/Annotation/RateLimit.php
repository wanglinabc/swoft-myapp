<?php
/**
 * Created by PhpStorm.
 * User: wanglin
 * Date: 2018/12/27
 * Time: 16:55
 */

namespace App\Bean\RateLimit\Bean\Annotation;

/**
 * 限流注解，可灵活控制接口请求速率
 * Class RateLimit
 * @package App\Bean\RateLimit\Bean\Annotation
 * @Annotation
 * @Target("METHOD")
 */
class RateLimit
{
    /**
     * 默认1秒中请求一次
     * @var int
     */
    private $limit = 5;

    public function __construct(array $params)
    {
        if (empty($params)) {
            if (isset($params['limit'])) {
                $this->limit = (int)$params['limit'];
            }
            if (current($params)) {
                $this->limit = (int)current($params);
            }
        }
    }

    public function getLimit(): int
    {
        return $this->limit;
    }

}