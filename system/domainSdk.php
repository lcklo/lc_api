<?php
/**
 * User linchao
 * Date 2016-9-6
 * Time 14:26:23
 */
namespace system;

class domainSdk {
    
    private static $code;
    private static $message = '';
    
    /**
     * 存放成功信息
     * @param str $msg
     * @param int $code
     * @return boolean
     */
//    public static function setSuccessMsg($msg, $code=0) {
//        self::$message = $msg;
//        self::$code = $code;
//        return true;
//    }
    
    /**
     * 存放错误信息
     * @param str $msg
     * @param int $code
     * @return boolean
     */
    public static function setErrorMsg($msg, $code=400) {
        self::$message = $msg;
        self::$code = $code;
        return false;
    }
    
    /**
     * 获取消息
     * @return str
     */
    public static function getMessage() {
        return self::$message;
    }
    
    /**
     * 获取编号
     * @return int
     */
    public static function getCode() {
        return self::$code;
    }
}