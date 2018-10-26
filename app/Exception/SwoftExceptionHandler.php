<?php
/**
 * This file is part of Swoft.
 *
 * @link https://swoft.org
 * @document https://doc.swoft.org
 * @contact group@swoft.org
 * @license https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Exception;

use App\Utils\SysMessage;
use Swoft\App;
use Swoft\Bean\Annotation\ExceptionHandler;
use Swoft\Bean\Annotation\Handler;
use Swoft\Bean\Annotation\Inject;
use Swoft\Exception\RuntimeException;
use Exception;
use Swoft\Http\Message\Server\Request;
use Swoft\Http\Message\Server\Response;
use Swoft\Exception\BadMethodCallException;
use Swoft\Exception\ValidatorException;
use Swoft\Http\Server\Exception\BadRequestException;


/**
 * the handler of global exception
 *
 * @ExceptionHandler()
 * @uses      Handler
 * @version   2018年01月14日
 * @author    stelin <phpcrazy@126.com>
 * @copyright Copyright 2010-2016 swoft software
 * @license   PHP Version 7.x {@link http://www.php.net/license/3_0.txt}
 */
class SwoftExceptionHandler
{

    /**
     *
     * @Inject()
     * @var SysMessage
     */
    protected $message;

    /**
     * @Handler(Exception::class)
     *
     * @param Response $response
     * @param \Throwable $throwable
     *
     * @return Response
     */
    public function handlerException(Response $response, \Throwable $throwable)
    {
        $data = $this->message->error( $throwable->getMessage(),$throwable->getCode());
        return $response->json($data);
    }

    /**
     * @Handler(RuntimeException::class)
     *
     * @param Response $response
     * @param \Throwable $throwable
     *
     * @return Response
     */
    public function handlerRuntimeException(Response $response, \Throwable $throwable)
    {
        $file = $throwable->getFile();
        $code = $throwable->getCode();
        $exception = $throwable->getMessage();

        return $response->json([$exception, 'runtimeException']);
    }

    /**
     * @Handler(ValidatorException::class)
     *
     * @param Response $response
     * @param \Throwable $throwable
     *
     * @return Response
     */
    public function handlerValidatorException(Response $response, \Throwable $throwable)
    {
        $exception = $throwable->getMessage();

        return $response->json(['message' => $exception]);
    }

    /**
     * @Handler(BadRequestException::class)
     *
     * @param Response $response
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
     * @Handler(BadMethodCallException::class)
     *
     * @param Request $request
     * @param Response $response
     * @param \Throwable $throwable
     *
     * @return Response
     */
    public function handlerViewException(Request $request, Response $response, \Throwable $throwable)
    {
        $name = $throwable->getMessage() . $request->getUri()->getPath();
        $notes = [
            'New Generation of PHP Framework',
            'High Performance, Coroutine and Full Stack',
        ];
        $links = [
            [
                'name' => 'Home',
                'link' => 'http://www.swoft.org',
            ],
            [
                'name' => 'Documentation',
                'link' => 'http://doc.swoft.org',
            ],
            [
                'name' => 'Case',
                'link' => 'http://swoft.org/case',
            ],
            [
                'name' => 'Issue',
                'link' => 'https://github.com/swoft-cloud/swoft/issues',
            ],
            [
                'name' => 'GitHub',
                'link' => 'https://github.com/swoft-cloud/swoft',
            ],
        ];
        $data = compact('name', 'notes', 'links');

        return view('exception/index', $data);
    }

    /**
     * @Handler(HttpException::class)
     * @param Response $response
     * @param \Throwable $throwable
     */
    public function handleHttpException(Response $response,\Throwable $throwable)
    {
        if(empty($throwable->getCode())){
            $data = $this->message->error( $throwable->getMessage());
        }else{
            $data = $this->message->error( $throwable->getMessage(),$throwable->getCode());
        }
        return $response->json($data);
    }

}