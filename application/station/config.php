<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

return [
    'login' => [
        'prefix' => 'cf',
    ],
    'admin_nav'               => [
        [
            'id'        => 1,
            'name'      => '常用设置',
            'next'      => [
                [
                    'id'         => '1-1',
                    'controller' => '/station/set',
                    'name'  => '查看/修改'
                ],
            ],
        ],
        [
            'id'        => 2,
            'name'      => '栏目管理',
            'next'      => [
                [
                    'id'        => '2-1',
                    'controller' => '/station/category',
                    'name'  => '栏目列表'
                ],
            ],
        ],
        [
            'id'        => 3,
            'name'      => '城市管理',
            'next'      => [
                [
                    'id'        => '3-1',
                    'controller' => '/station/city',
                    'name'  => '城市列表'
                ],
            ],
        ],
    ],
];
