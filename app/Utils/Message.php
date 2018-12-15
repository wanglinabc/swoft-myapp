<?php
/**
 * +----------------------------------------------------------------------
 * | 消息返回
 * +----------------------------------------------------------------------
 * | Copyright (c) 2016 http://www.sunnyos.com All rights reserved.
 * +----------------------------------------------------------------------
 * | Date：2018-09-13 08:39:03
 * | Author: Sunny (admin@sunnyos.com) QQ：327388905
 * +----------------------------------------------------------------------.
 */

namespace App\Utils;

use Swoft\Bean\Annotation\Bean;
use SysMsg;

/**
 * @Bean()
 */
class Message
{
    /**
     * 成功返回.
     *
     * @param string $msg  成功消息
     * @param int    $code 返回码
     * @param array  $data 返回数据
     *
     * @return array
     */
    public function success(array $data = [], string $msg = '', int $code = SysCode::SUCCESS): array
    {
        $return_data = ['code' => $code, 'msg' => $msg ?: SysMsg::SYSMSG[$code], 'data' => $data];
        if (empty($return_data['data'])) {
            unset($return_data['data']);
        }

        return $return_data;
    }

    /**
     * 错误返回.
     *
     * @param string $msg  错误消息
     * @param int    $code 返回码
     * @param array  $data 返回数据
     *
     * @return array
     */
    public function error(int $code = SysCode::ERROR, string $msg = ''): array
    {
        return ['code' => $code, 'msg' => $msg ?: SysMsg::SYSMSG[$code]];
    }

    /**
     * 自动判断是否有数据返回.
     *
     * @param array $data 需要判断的数据
     *
     * @return array
     */
    public function resp($data): array
    {
        if (is_array($data)) {
            return $this->success($data, '', SysCode::SUCCESS);
        } else {
            return $this->error(SysCode::ERROR, '');
        }
    }
}
