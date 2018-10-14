<?php
/**
 * +----------------------------------------------------------------------
 * | 消息返回
 * +----------------------------------------------------------------------
 * | Copyright (c) 2016 http://www.sunnyos.com All rights reserved.
 * +----------------------------------------------------------------------
 * | Date：2018-09-13 08:39:03
 * | Author: Sunny (admin@sunnyos.com) QQ：327388905
 * +----------------------------------------------------------------------
 */

namespace App\Utils;

use Swoft\Bean\Annotation\Bean;
use App\Utils\SysCode;

/**
 * @Bean()
 * @package App\Utils\SysMessage
 */
class SysMessage
{
    const SYSMSG = [
        '0' => "SUCCESS",
        '1' => 'ERROR',
        '100000' => '参数错误！'
    ];

    /**
     * 成功返回
     * @param string $msg 成功消息
     * @param int $code 返回码
     * @param array $data 返回数据
     * @return array
     */
    public function success($code = SysCode::SUCCESS, $data = [], $msg = '')
    {
        return ['code' => $code, 'msg' => $msg ?? self::SYSMSG[$code], 'data' => $data];
    }

    /**
     * 错误返回
     * @param string $msg 错误消息
     * @param int $code 返回码
     * @param array $data 返回数据
     * @return array
     */
    public function error( $msg = '', $code = SysCode::ERROR)
    {
        return ['code' => $code, 'msg' => $msg ?? self::SYSMSG[$code]];
    }

    /**
     * 自动判断是否有数据返回
     * @param array $data 需要判断的数据
     * @return array
     */
    public function resp($data)
    {
        if (is_array($data)) {
            return $this->success(SysCode::SUCCESS, $data, SysCode::ERROR);
        } else {
            return $this->error(SysCode::ERROR, '');
        }
    }
}