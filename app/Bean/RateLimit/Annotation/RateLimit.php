<?php
/**
 * Created by PhpStorm.
 * User: wanglin
 * Date: 2019/1/18
 * Time: 15:08
 */

namespace App\Bean\RateLimit\Annotation;


use Doctrine\Common\Annotations\Annotation\Target;

/**
 * @Annotation
 * Class RateLimit
 * @package App\Bean\RateLimit
 * @Target("ALL")
 */
class RateLimit
{

    /**
     * @var int
     */
    private $limit=5;

    public function __construct(array $array)
    {
        if(isset($array['limit']) && $array['limit']>0){
            $this->limit=(int)$array['limit'];
        }
        if(isset($array['value']) && $array['value']>0){
            $this->limit=(int)$array['value'];
        }
    }

    public function getLimit():int
    {
        return $this->limit;
    }
}