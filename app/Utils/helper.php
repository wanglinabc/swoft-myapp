<?php
/**
 * Created by PhpStorm.
 * User: wanglin
 * Date: 2018/10/26
 * Time: 17:47
 */

if(function_exists("error_exit")){

    function error_exit($msg,$code=null){
        throw new \app\Exception\HttpException($msg,$code);
    }

}