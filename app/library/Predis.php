<?php
/**
 * User linchao
 * Date 2016-9-5
 * Time 18:48:38
 */
class Predis {
    private static $cli = null;
    
    public static function __callStatic($name, $param) {
        !is_null(self::$cli) ? : self::$cli = new Predis\Client(Conf::get('db-redis'));
        return call_user_func_array(array(self::$cli, $name), $param);
    }
}
