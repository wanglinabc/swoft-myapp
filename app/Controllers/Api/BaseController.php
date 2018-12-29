<?php
/**
 * Created by PhpStorm.
 * User: wanglin
 * Date: 2018/10/8
 * Time: 14:28
 */

namespace App\Controllers\Api;


use App\Utils\SysCode;
use Inhere\Validate\Validation;

class BaseController
{


    public function __construct()
    {

    }

    /**
     * 验证器
     * @param array $data
     * @param array $rules
     * @return bool|null
     * @throws \app\Exception\HttpException
     */
    public function validate(array $data, array $rules): void
    {
        if ($data && $rules) {
            $checkStatus = Validation::check($data, $rules);
            if ($checkStatus->fail()) {
                error_exit(SysCode::PARAMS_VALID_ERROR, $checkStatus->firstError());
            }
        }
    }
}