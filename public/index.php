<?php
/**
 * User linchao
 * Date 2016-9-5
 * Time 10:55:03
 */
include './init.php';

/**----------- 路由功能 ------------**/
new system\Route();

/**----------- 抛出数据 ------------**/
\Api::outApi();