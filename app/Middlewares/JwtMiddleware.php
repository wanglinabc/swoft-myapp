<?php
/**
 * Created by PhpStorm.
 * User: wanglin
 * Date: 2018/10/8
 * Time: 14:16
 */

namespace App\Middlewares;


use App\Utils\SysCode;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Swoft\App;
use Swoft\Bean\Annotation\Inject;
use Swoft\Http\Message\Middleware\MiddlewareInterface;
use Swoft\Bean\Annotation\Bean;
use App\Utils\JwtToken;
/**
 * @Bean()
 * Class JwtMiddleware
 * @package App\Middlewares
 */

class JwtMiddleware implements MiddlewareInterface
{

    protected $is_allow=['/login/index','/login/register','/login/logout'];

    /**
     * @Inject()
     * @var JwtToken
     */
    protected $jwt;
    /**
     * Process an incoming server request and return a response, optionally delegating
     * response creation to a handler.
     *
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @param \Psr\Http\Server\RequestHandlerInterface $handler
     * @return \Psr\Http\Message\ResponseInterface
     * @throws
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $requestUrl = $request->getUri();
        if(in_array($requestUrl->getPath(),$this->is_allow)){
            return $handler->handle($request);
        }
       $token=$request->getHeaderLine('Authorization');
        if(!$token){
            error_exit(SysCode::USER_NEED_LOGIN_AGIGN,"缺少token参数！");
        }
        if($this->jwt->verify($token) === false){
            error_exit(SysCode::USER_NEED_LOGIN_AGIGN);
        }
        return $handler->handle($request);
    }





}