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
 * @Controller(prefix="/login/")
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
     * @RequestMapping(route="index", method={RequestMethod::POST})
     * @param Request $requests
     * @return array
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
     */
   public function userExis(Request $request):array
   {
       $username=$request->json('username');
       $result=$this->loginService->userExis($username);
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