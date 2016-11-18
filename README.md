# lc_api
一款api框架，使用命名空间加载方式，超级灵活

/**--------------------- 安装说明 ----------------**/
需要composer的一些扩展包，请先执行composer install
# composer安装参考 http://pkg.phpcomposer.com/

/**--------------------- 类说明 ------------------**/

系统核心类放置在system目录下，常用类有以下几个，使用方法见类方法注释
Input   --> 获取get、post请求
Conf    --> 读取app/conf目录下的配置项

公用类放置在app/library目录下
DB类使用的是laravel的数据库类，使用方法一致
