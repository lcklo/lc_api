<?php
/**
 * User linchao
 * Date 2016-9-5
 * Time 14:46:30
 */
namespace system;

/**------------------ 实现路由功能 -------------------**/
class Route {
    
    private $class_name;
    private $function_name;
    private $class_uri;
    private $class_suffix    = 'Controller';
    private $controllers_dir = 'app/controllers/';
    
    public function __construct() {
        if ( !isset($_SERVER['PHP_SELF']) ) {
            return \Api::setApiError('路由无法识别..');
        }
        $data = $this->getClassDate($_SERVER['PHP_SELF']);
        if ($data !== true) {
            return \Api::setApiData($data);
        }
        \Api::setApiData($this->check());
    }
    
    private function getClassDate($uri) {
        $data = explode('/', trim($uri, '/'));
        $num = count($data);
        if ($num < 2) {
            \Api::setApiMsg('Hello~');
            return date('Y-m-d H:i:s');
        }
        if ($num == 2) {
            return \Api::setApiError('没有这个目录或文件！', 404);
        }
        unset($data[0]);
        $this->class_name = $data[$num-2] .= $this->class_suffix;
        $this->function_name = $data[$num-1];
        unset($data[$num-1]);
        $uri = $this->controllers_dir . implode('/', $data);
        $file =  API_ROOT . $uri . '.php';
        if ( !file_exists($file) ) {
            return \Api::setApiError('没有这个目录或文件！', 404);
        }
        $this->class_uri = str_replace('/', '\\', $uri);
        return true;
    }
    
    private function check() {
        if ( !class_exists($this->class_uri) ) {
            return \Api::setApiError('未定义的类：' . $this->class_name, 404);
        }
        $data = new $this->class_uri;
        if ( !method_exists($data, $this->function_name) ) {
            return \Api::setApiError('未定义的方法：'. $this->function_name, 404);
        }
        return $data->{$this->function_name}();
    }
}