<?php
/**
 * This file is part of Swoft.
 *
 * @link https://swoft.org
 * @document https://doc.swoft.org
 * @contact group@swoft.org
 * @license https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Controllers\Admin;


use Swoft\App;
use Swoft\Core\Coroutine;
use Swoft\Bean\Annotation\Inject;
use Swoft\Http\Server\Bean\Annotation\Controller;
use Swoft\Http\Server\Bean\Annotation\RequestMapping;
use Swoft\Http\Server\Bean\Annotation\RequestMethod;
use Swoft\Http\Message\Server\Request;

/**
 * 控制器demo
 * @Controller(prefix="/admin/login/")
 */
class AuthController
{

    /**
     *
     * @RequestMapping(route="index", method={RequestMethod::POST})
     *
     * @param Request $request
     *
     * @return array
     */
    public function index(Request $request)
    {

       return   ['test'=>'swoft'];

    }




}
