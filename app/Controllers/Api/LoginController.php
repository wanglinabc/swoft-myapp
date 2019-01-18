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
 * @Controller(prefix="/Auth/")
 *
 */
class LoginController extends BaseController
{

    /**
     * @Inject()
     * @var LoginService
     */
    protected $loginService;


    /**
     * 用户登录
     * @RequestMapping(route="index", method={RequestMethod::POST})
     * @RateLimit(limit=2)
     * @param Request $requests
     * @return array
     * @throws
     */
    public function index(Request $request):array
    {
      $params=$request->post();
      $result=$this->loginService->login($params);
      return $result;
    }

    /**
     * 用户注册
     * @RequestMapping(route="register",method={RequestMethod::POST})
     * @param Request $request
     * @return array
     * @throws
     */
    public function register(Request $request):array
    {
        $params=$request->post();
        $result=$this->loginService->register($params);
        return $result;
    }

    /**
     * 判断用户名是否注册
     * @RequestMapping(route="userexis",method={RequestMethod::POST})
     * @param Request $request
     * @return array
     * @throws
     */
   public function userExis(Request $request):array
   {
       $loginName=$request->json('login_name');
       $result=$this->loginService->userExis($loginName);
       return $result;
   }


    /**
     * @RequestMapping(route="logout",method={RequestMethod::POST})
     * @param Request $request
     * @return array
     * @throws
     */
    public function decode(Request $request){
        $params=$request->input("token");
        $result=$this->loginService->encode($params);
        return $result;
    }

}