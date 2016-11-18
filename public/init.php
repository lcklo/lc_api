<?php
/**
 * User linchao
 * Date 2016-9-5
 * Time 11:02:50
 */
/**-------------------------- 这里是一些公用组件 ------------------------**/
//header("Content-type:text/html;charset=utf-8");
date_default_timezone_set('Asia/Shanghai');
//项目根目录
define('API_ROOT', __DIR__ . '/../');

/**------------------- 获取配置项值类 -------------------**/
require API_ROOT . 'system/Conf.php';

//自动加载对应类文件
spl_autoload_register(function($class) {
    $data = Conf::get('app-class.' . $class);
    if ( !is_null($data) ) {
        $class = $data;
    }
    $class = API_ROOT . str_replace('\\', '/', trim($class, '\\')) . '.php';
    if ( file_exists($class) ) {
        require $class;
    }
});

//防止xss攻击
//function banXss($data) {
//    foreach ($data as &$v) {
//        (!empty($v) && is_array($v)) ? $v = banXss($v) : $v = htmlspecialchars($v);
//        echo $v;
//    }
//    return $data;
//}
//empty($_GET) ? : $_GET = banXss($_GET);
//empty($_POST) ? : $_POST = banXss($_POST);
//exit;
/**------------------- 扩展包 -------------------**/
require API_ROOT . 'vendor/autoload.php';