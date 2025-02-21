<?php

use  Illuminate\Contracts\Container\Container;

// Aside menu
return [
    'items' => [
        // Dashboard
        [
            'title' => 'Dashboard',
            'root' => true,
            'permission' => '',
            'icon' => 'assets/backend/themes/media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
            'route' => 'admin.dashboard',
            'page' => '',
            'new-tab' => false,
        ],
        [
            'section' => 'Cá nhân',
        ],
        [
            'title' => 'Thông tin tài khoản',
            'root' => true,
            'icon' => 'far fa-user-circle', // or can be 'flaticon-home' or any flaticon-*
            'route' => 'admin.profile',
            'page' => '',
            'new-tab' => false,
        ],
        [
            'title' => 'Bảo mật tài khoản',
            'root' => true,
            'icon' => 'flaticon-user-settings', // or can be 'flaticon-home' or any flaticon-*
            'route' => 'admin.security-2fa.index',
            'permission' =>'security-2fa',
            'page' => '',
        ],
        [
            'section' => 'Tài khoản',
            'permission' => 'user-list,user-qtv-list',
        ],
        [
            'title' => 'Danh sách QTV',
            'icon' => 'fas fa-user-cog',
            'bullet' => 'line',
            'permission' => 'user-qtv-list',
            'route' => 'admin.user-qtv.index',
            'page' => ''
        ],
        [
            'section' => 'Hubspot',
            'permission' => 'hubspot-user-list',
        ],
        [
            'title' => 'Danh sách người dùng',
            'icon' => 'flaticon-interface-3',
            'bullet' => 'line',
            'permission' => 'hubspot-user-list',
            'route' => 'admin.hubspot-user.index',
            'page' => ''
        ],
        [
            'title' => 'Danh sách Ticket',
            'icon' => 'flaticon-interface-3',
            'bullet' => 'line',
            'permission' => 'hubspot-ticket-list',
            'route' => 'admin.hubspot-ticket.index',
            'page' => ''
        ],
        [
            'title' => 'Danh sách Deal',
            'icon' => 'flaticon-interface-3',
            'bullet' => 'line',
            'permission' => 'hubspot-deal-list',
            'route' => 'admin.hubspot-deal.index',
            'page' => ''
        ],
    ]

];
