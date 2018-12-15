<?php
/**
 * Created by PhpStorm.
 * User: wanglin
 * Date: 2018/10/8
 * Time: 14:28
 */

namespace App\Controllers\Api;


use Swoft\App;

class BaseController
{


  public function __construct()
  {

  }


  public function validate(array $data,string $name):?bool
  {
        $validate=App::getBean($name);
        if(!empty($validate)){
             $result=$validate->check($data);
             if($result !== true){
                 error_exit($validate->getError());
             }
        }
      error_exit("验证器{$name}不存在！");
  }
}