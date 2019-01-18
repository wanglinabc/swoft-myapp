<?php
/**
 * Created by PhpStorm.
 * User: wanglin
 * Date: 2018/10/15
 * Time: 17:17
 */

namespace App\Services;

use App\Exception\HttpException;
use App\Utils\JwtToken;
use App\Utils\Message;
use App\Utils\SysCode;
use App\Utils\Util;
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
     * @var Message
     */
    private $message;
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
        $userData = Query::table(User::class)->where('username', $param['username'])->orWhere("mobile", $param['username'])->limit(1)->get()->getResult();
        if (empty($userData)) {
             error_exit(SysCode::USER_NOT_EXIST);
        }
        $userData=current($userData);
        $passwd = md5($param['password'] . $userData['salt']);
        if ($passwd != $userData['password']) {
            error_exit(SysCode::USER_PASSWORD_ERROE);
        }
        $token = $this->Jwt->encode(['userId' => $userData['id'], 'username' => $userData['username']]);
        return $this->message->success(['token' => $token], "登录成功");
    }

    /**
     * 注册用户
     * @param array $params
     * @throws HttpException
     * @return array
     */
    public function register(array $params): array
    {
        $this->userExis($params['username']);
        $user = new User();
        if(preg_match("/^1[34578]\d{9}$/",$params['username'])){
            $user->setMobile($params['username']);
        }else{
            $user->setUsername($params['username']);
            $user->setRealname(($params['username']));
        }
        $user->setSalt(Util::randStr());
        $user->setPassword(md5($params['password'] . $user->getSalt()));
        $id = $user->save()->getResult();
        if (empty($id)) {
            error_exit(SysCode::USER_REGISTER_FAILURE);
        }
        return $this->message->success([], "注册成功");
    }


    /**
     * 注册时判断用户名是否存在
     * @param string $loginName
     * @throws HttpException
     * @return array
     */
    public function userExis(string $loginName): array
    {
        $params['username']=$loginName;
        if(preg_match("/^1[34578]\d{9}$/",$loginName)){
            $params['mobile']=$loginName;
        }
        $data = User::findOne($params, ['fields' => ['id']])->getResult();
        if (!empty($data)) {
          error_exit(SysCode::USER_HAS_ALEADY_EXIST);
        }
        return $this->message->success([], "可正常注册");
    }


    public function encode(string $token)
    {
        return $this->message->success($this->Jwt->decode($token), "登录成功");
    }
}