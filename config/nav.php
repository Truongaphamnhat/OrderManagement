<?php

return [
    [
        'icon' => 'home',
        'name' => 'Tổng quan',
        'route' => 'get_admin.home',
        'prefix' => [''],
    ],
    [
        'icon' => 'layers',
        'name' => 'Danh mục',
        'route' => 'get_admin.category.index',
        'prefix' => ['category'],
    ],
    [
        'icon' => 'file-text',
        'name' => 'Khách hàng',
        'route' => 'get_admin.customer.index',
        'prefix' => ['customer'],
    ],
    [
        'icon' => 'users',
        'name' => 'User',
        'route' => 'get_admin.user.index',
        'prefix' => ['user'],
    ]
];