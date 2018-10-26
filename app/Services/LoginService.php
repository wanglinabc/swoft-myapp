<?php
/**
 * Created by PhpStorm.
 * User: wanglin
 * Date: 2018/10/15
 * Time: 17:17
 */

namespace App\Services;

use App\Utils\JwtToken;
use App\Utils\SysMessage;
use Swoft\App;
use Swoft\Bean\Annotation\Bean;
use App\Models\Entity\User;
use Swoft\Bean\Annotation\Inject;

/**
 * Class LoginService
 * @package App\Services
 * @Bean()
 */
class LoginService
{
    /**
     * @Inject()
     * @var SysMessage
     */
    protected $message;

    /**
     * @Inject()
     * @var JwtToken
     */
    protected $Jwt;

 public function login(array $param):array
 {
     $user2 = User::findOne(['username' => $param['username']], ['fields' => ['*']])->getResult();
     if(!$user2){
         return $this->message->error("用户不存在！");
     }
     if($param['password'] != $user2['password']){
         return $this->message->error("密码错误！");
     }

     $token=$this->Jwt->encode(['userId'=>$user2['id'],'username'=>$user2['username']]);
     return $this->message->success(['token'=>$token],"登录成功");
 }

 public function encode(string $token){
     return $this->message->success($this->Jwt->decode($token),"登录成功");
 }
}