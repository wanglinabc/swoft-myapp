<?php
/**
 * This file is part of Swoft.
 *
 * @see https://swoft.org
 * @document https://doc.swoft.org
 * @contact group@swoft.org
 *
 * @license https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Exception;

use App\Utils\Message;
use Swoft\Bean\Annotation\ExceptionHandler;
use Swoft\Bean\Annotation\Handler;
use Swoft\Bean\Annotation\Inject;
use Exception;
use Swoft\Http\Message\Server\Response;
use Swoft\Exception\ValidatorException;
use Swoft\Exception\RuntimeException;
use Swoft\Http\Server\Exception\BadRequestException;

/**
 * the handler of global exception.
 *
 * @ExceptionHandler()
 *
 * @uses      \Handler
 *
 * @version   2018年01月14日
 *
 * @author    stelin <phpcrazy@126.com>
 * @copyright Copyright 2010-2016 swoft software
 * @license   PHP Version 7.x {@link http://www.php.net/license/3_0.txt}
 */
class HttpExceptionHandler
{

    /**
     * @Inject()
     * @var Message
     */
    protected $message;
    /**
     * @Handler(Exception::class)
     * @param Response   $response
     * @param \Throwable $throwable
     * @return Response
     */
    public function handlerException(Response $response, \Throwable $throwable)
    {
        return $response->json($this->message->error($throwable->getCode(), $throwable->getMessage()));
    }

    /**
     * @Handler(RuntimeException::class)
     *
     * @param Response   $response
     * @param \Throwable $throwable
     *
     * @return Response
     */
    public function handlerRuntimeException(Response $response, \Throwable $throwable)
    {
        $file      = $throwable->getFile();
        $code      = $throwable->getCode();
        $exception = $throwable->getMessage();
        return $response->json([$exception, 'runtimeException']);
    }
    /**
     * @Handler(BadRequestException::class)
     *
     * @param Response   $response
     * @param \Throwable $throwable
     *
     * @return Response
     */
    public function handlerBadRequestException(Response $response, \Throwable $throwable)
    {
        $exception = $throwable->getMessage();
        return $response->json(['message' => $exception]);
    }


    /**
     * @Handler(ValidatorException::class)
     * @param Response   $response
     * @param \Throwable $throwable
     * @return Response
     */
    public function handlerValidatorException(Response $response, \Throwable $throwable)
    {
        $exception = $throwable->getMessage();
        return $response->json(['message' => $exception]);
    }


    /**
     * @Handler(HttpException::class)
     * @param Response   $response
     * @param \Throwable $throwable
     * @return
     */
    public function handleHttpException(Response $response, \Throwable $throwable)
    {
        return $response->json($this->message->error($throwable->getCode(), $throwable->getMessage()));
    }
}
