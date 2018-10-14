<?php
/**
 * Created by PhpStorm.
 * User: 15915
 * Date: 2018/10/13
 * Time: 20:56
 */
require_once dirname(__DIR__) . '/vendor/autoload.php';

$key = "example_key";
$token = array(
    "iss" => "http://example.org",
    "aud" => "http://example.com",
    "iat" => 1356999524,
    "nbf" => 1357000000
);
$jwt = \Firebase\JWT\JWT::encode($token, $key);
echo $jwt;
//$decoded = \Firebase\JWT\JWT::decode($jwt, $key, array('HS256'));
//\Firebase\JWT\JWT::$leeway = 60;
//var_export((array)$decoded);