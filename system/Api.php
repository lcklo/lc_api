<?php
/**
 * User linchao
 * Date 2016-9-5
 * Time 15:37:12
 */
use system\Header;
use system\Json;

class Api {
    
    private static $code = 200;
    private static $data = null;
    private static $msg = '';
    
    /**
    * 自定义api错误消息
    * @param str $msg
    * @param int $code
    */
    public static function setApiError($msg, $code=400) {
        self::$code = $code;
        self::$msg = $msg;
        return self::$data;
    }

    /**
    * 自定义api正确消息
    * @param str $msg
    */
    public static function setApiMsg($msg) {
        self::$msg = $msg;
        return self::$data;
    }
    
    public static function setApiData($data) {
        self::$data = $data;
    }
    
    /**
     * 返回API格式化消息
     */
    public static function outApi() {
//        Header::show(self::$code);
        echo Json::encode(array(
            'code' => self::$code,
            'data' => self::$data,
            'msg' => self::$msg,
        ));
        exit;
    }
}