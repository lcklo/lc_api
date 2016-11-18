<?php
/**
 * User linchao
 * Date 2016-9-8
 * Time 10:09:56
 */
class Input {
    
    private static $is_must = true;
    
    /**
     * 接收get参数
     * @param str $name
     * @param str $msg
     * @param bool $is_must 是否检测为空
     * @return mix
     */
    public static function get($name, $msg='', $is_must=true) {
        self::$is_must = $is_must;
        return self::getData($_GET, $name, $msg);
    }
    
    /**
     * 接收post参数
     * @param str $name
     * @param str $msg
     * @param bool $is_must 是否检测为空
     * @return mix
     */
    public static function post($name, $msg='', $is_must=true) {
        self::$is_must = $is_must;
        return self::getData($_POST, $name, $msg);
    }
    
    private static function getData($data, $name, $msg='') {
        if ( !self::$is_must ) {
            return isset($data[$name]) ? $data[$name] : null;
        }
        if ( !isset($data[$name]) ) {
            \Api::setApiError('缺少'. ($msg ? : $name) .'参数！');
            \Api::outApi();
        }
        if ($data[$name] === '') {
            \Api::setApiError($msg ?  $msg .'不能为空！' : '缺少参数！');
            \Api::outApi();
        }
        return $data[$name];
    }
}