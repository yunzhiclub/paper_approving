<?php
return array(
	/* 模板相关配置 */
    'TMPL_PARSE_STRING' => array(
        '__BOW__'    	=> __ROOT__ . '/Admin/bower_components',
        '__DIST__'      => __ROOT__ . '/Admin/dist',
        '__CSS__'    	=> __ROOT__ . '/Admin/css',
        '__JS__'     	=> __ROOT__ . '/Admin/js',
        '__IMG__'       => __ROOT__ . '/img',
    ),
    
	'MODULE_ALLOW_LIST'    =>  	array('Login'),			//允许访问模块
	'DEFAULT_MODULE'       =>   'Login',  				// 默认模块
	
	
);

