<?php
/**
 * Created by PhpStorm.
 * User: wanglin
 * Date: 2018/10/8
 * Time: 16:14
 * Description: 系统错误码
 */

namespace App\Utils;


class SysCode
{
    //  =================================== 通用状态码
    const SUCCESS = 0;  //0代表成功
    const ERROR = 1;    //1代表失败


    const PARAMS_VALID_ERROR = 0000001;//参数验证失败
    const REQUEST_LIMIT_ERROR=0000002;//请求评率限制

    //==================================用户模块:10=========================
    const USER_NEED_LOGIN_AGIGN = 1000000;//登录状态异常
    const USER_NOT_EXIST = 1000001;//用户不存在
    const USER_PASSWORD_ERROE = 1000002;//用户密码错误
    const USER_REGISTER_FAILURE=1000003;//用户注册失败
    const USER_HAS_ALEADY_EXIST=100004;//用户已存在

}