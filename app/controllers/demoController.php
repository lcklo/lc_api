<?php
/**
 * User linchao
 * Date 2016-9-5
 * Time 13:32:34
 */
namespace app\controllers;

use app\controllers\Controller;
use Predis as Redis;
use DB, Conf, Input, Curl;

class demoController extends Controller {
    
    public function index() {
        \Api::setApiMsg('测试消息');
        return '123';
    }
    
    public function error() {
        return \Api::setApiError('测试错误消息');
    }
    
    public function redis() {
        Redis::set('a', 123);
        \Api::setApiMsg('Hello~');
        return Redis::get('a');
    }
    
    public function mysql() {
        $data = DB::table('user')->take(5)->get();//print_r($data);exit;
//        $db = DB::useDb('ceshi');
        return $data;
        foreach ($data as $v) {
            print_r($v);
        }
        exit;
        return array_merge($data, ($db::table('user')->skip(1)->take(1)->get()));
    }
    
    public function curl() {
        $data = Curl::get('http://php.php/ceshi.php');
//        $data = Curl::get('http://www.php.123');
        if ($data === false) {
            return Curl::getMsg();
        }
        return $data;
//        return Curl::get('http://php.php/ceshi.php');
    }
    
    public function ceshi() {
        return Input::get('name');
    }
}