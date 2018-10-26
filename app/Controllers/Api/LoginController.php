<?php
/**
 * Created by PhpStorm.
 * User: wanglin
 * Date: 2018/10/8
 * Time: 14:35
 */

namespace App\Controllers\Api;


use App\Services\LoginService;
use Swoft\Bean\Annotation\Inject;
use Swoft\Http\Message\Server\Request;
use Swoft\Http\Server\Bean\Annotation\Controller;
use Swoft\Http\Server\Bean\Annotation\RequestMapping;
use Swoft\Http\Server\Bean\Annotation\RequestMethod;

/**
 *
 * @Controller(prefix="/api/login/")
 *
 */
class LoginController
{


    /**
     * @Inject()
     * @var LoginService
     */
    protected $loginService;

    /**
     *
     * @RequestMapping(route="index", method={RequestMethod::POST})
     *
     */
    public function index(Request $request)
    {
      $params=$request->post();
      $result=$this->loginService->login($params);
      return $result;
    }

    /**
     * @RequestMapping(route="logout",method={RequestMethod::POST})
     * @param Request $request
     * @return array
     */
    public function decode(Request $request){
        $params=$request->input("token");
        $result=$this->loginService->encode($params);
        return $result;
    }

}