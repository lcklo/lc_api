<?php
/**
 * User linchao
 * Date 2016-9-6
 * Time 17:03:43
 */
use Illuminate\Database\Capsule\Manager as Capsule;

class DB {
    
    private static $name = null;
    private static $cli = null;
    
    public static function __callStatic($name, $param) {
        if ( is_null(self::$name) ) {
            self::useDb('default');
        }
        return call_user_func_array(array(self::$cli[self::$name], $name), $param);
    }
    
    /**
     * 查询连接库
     * @param str $table
     * @return Object
     */
    public static function R($table) {
        self::useDb('default');
        return self::table($table);
    }
    
    /**
     * 写连接库
     * @param str $table
     * @return Object
     */
    public static function W($table) {
        self::useDb('default');
        return self::table($table);
    }
    
    public static function useDb($name) {
        if ( isset(self::$cli[$name]) ) {
            return self::$cli[$name];
        }
        $info = Conf::get('db-mysql.' . $name);
        if ( !$info ) {
            \Api::setApiError('没有该数据库配置！', 500);
            \Api::outApi();
        }
        self::$name = $name;
        self::$cli[$name] = $data = new Capsule();
        $data->addConnection($info);                   //数据库配置
        $data->setFetchMode(Conf::get('db-mysql.fetch'));  //设置返回结果集格式
        $data->setAsGlobal();                          //支持静态访问
//        $data->bootEloquent();
        return $data;
    }
}