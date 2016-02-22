<?php
return array(
	/* 模板相关配置 */
    'TMPL_PARSE_STRING' => array(
        '__BOW__'    	=> __ROOT__ . '/Admin/bower_components',
        '__DIST__'      => __ROOT__ . '/Admin/dist',
        '__CSS__'    	=> __ROOT__ . '/Admin/css',
        '__JS__'     	=> __ROOT__ . '/Admin/js',
    ),

	'DATA_CACHE_PREFIX'    => 	'yunzhi_ethan_admin', 	// 缓存前缀
	'MODULE_ALLOW_LIST'    =>  	array('Home'),			//允许访问模块
	'DEFAULT_MODULE'       =>   'Home',  				// 默认模块
);

