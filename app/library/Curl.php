<?php
/**
 * User linchao
 * Date 2016-9-5
 * Time 18:48:38
 */
class Curl {
    private static $obj = null;
    private static $status_msg = null;
    
    public static function __callStatic($name, $param) {
        !is_null(self::$obj) ? : self::$obj = new anlutro\cURL\cURL;
        try {
            $data = call_user_func_array(array(self::$obj, $name), $param);
        } catch (Exception $e) {
            self::$status_msg = sprintf('code:%s, msg:%s', $e->getCode(), $e->getMessage());
            return false;
        }
        if (is_object($data) && isset($data->statusCode)) {
            if ($data->statusCode == 200) {
                return $data->body;
            }
            self::$status_msg = sprintf('code:%s, msg:%s', $data->statusCode, $data->statusText);
            return false;
        }
        
        return $data;
    }
    
    /**
     * 获取返回的状态文本信息
     */
    public static function getErrorMsg() {
        return self::$status_msg;
    }
}
