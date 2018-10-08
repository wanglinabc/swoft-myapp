<?php
/**
 * Created by PhpStorm.
 * User: wanglin
 * Date: 2018/10/8
 * Time: 14:35
 */

namespace App\Controllers\Admin;


use App\Utils\SysCode;
use App\Validates\LoginValidate;
use Swoft\Bean\Annotation\Inject;
use Swoft\Http\Message\Server\Request;
use Swoft\Http\Server\Bean\Annotation\Controller;
use Swoft\Http\Server\Bean\Annotation\RequestMapping;
use Swoft\Http\Server\Bean\Annotation\RequestMethod;

/**
 *
 * @Controller(prefix="/admin/login")
 *
 */
class LoginController
{

    /**
     * @Inject()
     * @var LoginValidate
     */
    protected $loginValidate;

    /**
     *
     * @RequestMapping(route="index", method={RequestMethod::POST})
     *
     */
    public function index(Request $request)
    {

        throw new \Exception("草儿", SysCode::ERROR);
    }

}