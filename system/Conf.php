<?php
/**
 * User linchao
 * Date 2016-9-8
 * Time 11:03:16
 */
class Conf {
    
    private static $data = [];
    
    /**
    * 获取配置项值
    * @param str $uri  示例:app/conf/db.php中的redis配置 get('db-redis');
    *                       app/conf/demo/app.php中的test下标的demo配置 get('demo/db/app-test.demo');
    */
   public static function get($uri) {
       if (strpos($uri, '-') === false) {
           return null;
       }
       $dir = API_ROOT . 'app/conf/';
       $uri = explode('-', $uri);
       $dir .= trim($uri[0], '/') . '.php';
       $uri = $uri[1];
       if ( !file_exists($dir) ) {
           return null;
       }
       if ( isset(self::$data[$dir]) ) {
           $data = self::$data[$dir];
       } else {
           self::$data[$dir] = $data = include $dir;
       }
       foreach (explode('.', $uri) as $v) {
           if ( !isset($data[$v]) ) {
               return null;
           }
           $data = $data[$v];
       }
       return $data;
   }
}