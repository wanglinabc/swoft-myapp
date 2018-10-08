<?php
/**
 * This file is part of Swoft.
 *
 * @link https://swoft.org
 * @document https://doc.swoft.org
 * @contact group@swoft.org
 * @license https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Controllers\Api;


use Swoft\App;
use Swoft\Core\Coroutine;
use Swoft\Bean\Annotation\Inject;
use Swoft\Http\Server\Bean\Annotation\Controller;
use Swoft\Http\Server\Bean\Annotation\RequestMapping;
use Swoft\Http\Server\Bean\Annotation\RequestMethod;
use Swoft\View\Bean\Annotation\View;
use Swoft\Core\Application;
use Swoft\Http\Message\Server\Request;

/**
 * 控制器demo
 * @Controller(prefix="/demo2")
 */
class AuthController
{

    /**
     * 定义一个route,支持get和post方式，处理uri=/demo2/index
     *
     * @RequestMapping(route="index", method={RequestMethod::GET, RequestMethod::POST})
     *
     * @param Request $request
     *
     * @return array
     */
    public function index(Request $request)
    {
        \Swoft\App::error("this debug log");
        $data=['code'=>200,'msg'=>'我来测试'];
       return json_encode($data,JSON_UNESCAPED_UNICODE);
    }

    
}