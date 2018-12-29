<?php

use App\Utils\SysCode;

class SysMsg
{
    const SYSMSG = [
        SysCode::SUCCESS => '操作成功！',
        SysCode::ERROR => '操作失败！',
        SysCode::PARAMS_VALID_ERROR => '参数校验失败！',
        SysCode::USER_NEED_LOGIN_AGIGN=>"请重新登录！",
        SysCode::USER_NOT_EXIST=>'用户不存在！',
        SysCode::USER_PASSWORD_ERROE=>"登录密码错误",
        SysCode::USER_REGISTER_FAILURE=>'注册失败！',
        SysCode::USER_HAS_ALEADY_EXIST=>"用户已存在",
        SysCode::REQUEST_LIMIT_ERROR=>'请求频率太频繁',


    ];
}
