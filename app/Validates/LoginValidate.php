<?php
/**
 * Created by PhpStorm.
 * User: wanglin
 * Date: 2018/10/8
 * Time: 16:00
 */

namespace App\Validates;

use App\Utils\Validate\Validate;
use Swoft\Bean\Annotation\Bean;

/**
 *
 * @Bean()
 * @package App\Models\Validates
 *
 */
class LoginValidate extends Validate
{
    protected $rule = [];

    protected $message = [];

    protected $scene = [];


}