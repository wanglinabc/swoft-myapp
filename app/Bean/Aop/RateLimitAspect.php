<?php
/**
 * 限速切面
 * Created by PhpStorm.
 * User: wanglin
 * Date: 2018/12/27
 * Time: 17:27
 */

namespace App\Bean\Aop;

use Swoft\Aop\ProceedingJoinPoint;
use Swoft\App;
use Swoft\Bean\Annotation\Around;
use Swoft\Bean\Annotation\Aspect;
use App\Bean\RateLimit\Bean\Annotation\RateLimit;
use App\Bean\RateLimit\Bean\Collector\RateLimitCollector;
use Swoft\Bean\Annotation\PointAnnotation;

/**
 * Class RateLimitAspect
 * @package App\Bean\Aop
 * @Aspect()
 * @PointAnnotation({
 *     include={
 *          RateLimit::class
 *     }
 *     )
 */
class RateLimitAspect
{

    /**
     * @Around()
     * @param ProceedingJoinPoint $proceedingJoinPoint
     * @return mixed
     */
 public function around(ProceedingJoinPoint $proceedingJoinPoint)
 {
     $objectAnnotation=$this->getAnnotation($proceedingJoinPoint);//获取注解对象
     $bean=App::getBean("RateLimit");
     $bean->beforeHandle(request(),$objectAnnotation);
     $result= $proceedingJoinPoint->proceed();
     $bean->afterHandle(request(),$objectAnnotation);
     return $result;
 }

    /**
     * 获取本
     * @param ProceedingJoinPoint $proceedingJoinPoint
     * @return RateLimit
     */

  public function getAnnotation(ProceedingJoinPoint $proceedingJoinPoint):RateLimit
  {
      $collector = RateLimitCollector::getCollector();
      $class_name = \get_class($proceedingJoinPoint->getTarget());
      return $collector[$class_name][$proceedingJoinPoint->getMethod()]['annotation'];
  }


}