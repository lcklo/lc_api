<?php
/**
 * User linchao
 * Date 2016-9-8
 * Time 10:22:52
 */
namespace system;

class Header {
    
    //输出返回头信息
    public static function show($code) {
        $data = array(
            200 => 'HTTP/1.1 200 OK',
            400 => 'HTTP/1.1 400 Bad Request',
            401 => 'HTTP/1.1 401 Unauthorized',
            404 => 'HTTP/1.1 404 Not Found',
            500 => 'HTTP/1.1 500 Internal Server Error',
        );
        if ( isset($data[$code]) ) {
            header($data[$code]);
            return true;
        } else {
            return false;
        }
    }
}