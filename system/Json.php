<?php
/**
 * User linchao
 * Date 2016-9-8
 * Time 10:38:19
 */
namespace system;

class Json {
    
    /**
    * 自定义json
    * @param array/object $data
    * @param bool         $is_end   不用传该参数，内部使用
    * @return json
    */
    public static function encode($data, $is_end=true) {
        if (empty($data) or (!is_array($data) && !is_object($data))) {
            return $data;
        }

        foreach ($data as &$v) {
            if ( empty($v) ) {
                continue;
            }
            if (is_array($v) or is_object($v)) {
                $v = self::encode($v, false);
                continue;
            }
            if (is_string($v) && (strpbrk($v, '\\"') === false)) {
                $v = urlencode($v);
            }
        }

        if ( $is_end ) {
            return urldecode(json_encode($data));
        }
        return $data;
    }
}