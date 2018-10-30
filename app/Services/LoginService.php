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
use App\Utils\Util;
use Swoft\App;
use Swoft\Bean\Annotation\Bean;
use App\Models\Entity\User;
use Swoft\Bean\Annotation\Inject;
use Swoft\Db\Query;

/**
 * Class LoginService
 * @package App\Services
 * @Bean()
 */
class LoginService extends BaseService
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


    /**
     * 用户登录
     * @param array $param
     * @return array
     * @throws \Exception
     */
    public function login(array $param): array
    {
        $user2 = Query::table(User::class)->where('username', $param['username'])->orWhere("mobile", $param['username'])->limit(1)->get()->getResult();
        if (!$user2) {
            return $this->message->error("用户不存在！");
        }
        $data=$user2[0];
        $passwd = md5($param['password'] . $data['salt']);
        if ($passwd != $data['password']) {
            return $this->message->error("密码错误！");
        }
        $token = $this->Jwt->encode(['userId' => $data['id'], 'username' => $data['username']]);
        return $this->message->success(['token' => $token], "登录成功");
    }

    /**
     * 注册用户
     * @param array $params
     * @return array
     */
    public function register(array $params): array
    {
        $user = new User();
        $user->setUsername($params['username']);
        $user->setRealname(($params['username']));
        $user->setMobile($params['mobile']);
        $user->setSalt(Util::randStr());
        $user->setPassword(md5($params['password'] . $user->getSalt()));
        $id = $user->save()->getResult();
        if (empty($id)) {
            error_exit("注册失败！");
        }
        return $this->message->success([], "注册成功");
    }


    /**
     * 注册时判断用户名是否存在
     * @param string $username
     * @return array
     */
    public function userExis(string $username): array
    {
        $data = User::findOne(['username' => $username], ['fields' => ['id']])->getResult();
        if (empty($data)) {
            return $this->message->success([], "可正常注册");
        }
        return $this->message->error("用户已存在！");
    }


    public function encode(string $token)
    {
        return $this->message->success($this->Jwt->decode($token), "登录成功");
    }
}