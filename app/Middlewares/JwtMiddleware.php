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

    protected $is_allow=[];

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
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $uri = $request->getUri();
        if(in_array($uri,$this->is_allow)){
            return $handler->handle($request);
        }
       $token=$request->getHeaderLine('Authorization');
        if(!isset($token)){
            throw new \Exception("缺少 Authorization 信息",SysCode::ERROR);
        }

        if($this->jwt->verify($token) === false){
            throw new \Exception("请重新登录！",SysCode::ERROR);
        }
        return $handler->handle($request);
    }





}