<?php
/**
 * Description: token验证类
 * Created by PhpStorm.
 * User: 15915
 * Date: 2018/10/13
 * Time: 21:55
 */

namespace App\Utils;

use Firebase\JWT\JWT;
use Swoft\Bean\Annotation\Bean;


/**
 * Class JwtToken
 * @package App\Utils
 * @Bean()
 */
class JwtToken
{
    //token有效期7天
    const EXPIRE_TIME = 7 * 24 * 3600;

    //加密秘钥
    const jwt_key = "RichardLin";

    public $Payload = [];


    /**
     * 创建jwttoken
     * @param array $param
     * @return string
     */
    public function encode(array $param): string
    {
        if (!is_array($param)) {
            throw new \Exception("jwt Payload  must be a array");
        }
        $param['expire_time']=time()+self::EXPIRE_TIME;//设置token有效期
        return JWT::encode($param, self::jwt_key);
    }


    /**
     * 解析token
     * @param string $token
     *
     */
    public function decode(string $token): array
    {
        $decoded = JWT::decode($token, self::jwt_key, array('HS256'));
        $this->Payload = (array)$decoded;
        return $this->Payload;
    }

    /**
     * 验证是否有效
     * @param string $token
     * @return bool
     */
    public function verify(string $token): bool
    {
        $param = $this->decode($token);
        if (!isset($param['expire_time'])) {
            return false;
        }

        if (time() > (int)$param['expire_time']){
            return false;
        }
        return true;

    }

    /**
     * 获取认证信息
     * @return array
     */
   public function getPayload():array
   {
       return $this->Payload;
   }


}