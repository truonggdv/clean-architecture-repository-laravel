<?php

return [

    // Self
    'self' => [
        'layout' => 'default', // blank, default
        'rtl' => false, // true, false
    ],

    // Base Layout
    'js' => [
        'breakpoints' => [
            'sm' => 576,
            'md' => 768,
            'lg' => 992,
            'xl' => 1200,
            'xxl' => 1200
        ],
        'colors' => [
            'theme' => [
                'base' => [
                    'white' => '#ffffff',
                    'primary' => '#6993FF',
                    'secondary' => '#E5EAEE',
                    'success' => '#1BC5BD',
                    'info' => '#8950FC',
                    'warning' => '#FFA800',
                    'danger' => '#F64E60',
                    'light' => '#F3F6F9',
                    'dark' => '#212121'
                ],
                'light' => [
                    'white' => '#ffffff',
                    'primary' => '#E1E9FF',
                    'secondary' => '#ECF0F3',
                    'success' => '#C9F7F5',
                    'info' => '#EEE5FF',
                    'warning' => '#FFF4DE',
                    'danger' => '#FFE2E5',
                    'light' => '#F3F6F9',
                    'dark' => '#D6D6E0'
                ],
                'inverse' => [
                    'white' => '#ffffff',
                    'primary' => '#ffffff',
                    'secondary' => '#212121',
                    'success' => '#ffffff',
                    'info' => '#ffffff',
                    'warning' => '#ffffff',
                    'danger' => '#ffffff',
                    'light' => '#464E5F',
                    'dark' => '#ffffff'
                ]
            ],
            'gray' => [
                'gray-100' => '#F3F6F9',
                'gray-200' => '#ECF0F3',
                'gray-300' => '#E5EAEE',
                'gray-400' => '#D6D6E0',
                'gray-500' => '#B5B5C3',
                'gray-600' => '#80808F',
                'gray-700' => '#464E5F',
                'gray-800' => '#1B283F',
                'gray-900' => '#212121'
            ]
        ],
        'font-family' => 'Poppins'
    ],

    // Page loader
    'page-loader' => [
        'type' => '' // default, spinner-message, spinner-logo
    ],

    // Header
    'header' => [
        'self' => [
            'display' => true,
            'width' => 'fluid', // fixed, fluid
            'theme' => 'light', // light, dark
            'fixed' => [
                'desktop' => true,
                'mobile' => true
            ]
        ],

        'menu' => [
            'self' => [
                'display' => true,
                'layout'  => 'default', // tab, default
                'root-arrow' => false, // true, false
            ],

            'desktop' => [
                'arrow' => true,
                'toggle' => 'click',
                'submenu' => [
                    'theme' => 'light',
                    'arrow' => true,
                ]
            ],

            'mobile' => [
                'submenu' => [
                    'theme' => 'dark',
                    'accordion' => true
                ],
            ],
        ]
    ],

    // Subheader
    'subheader' => [
        'display' => true,
        'displayDesc' => true,
        'layout' => 'subheader-v1',
        'fixed' => true,
        'width' => 'fluid', // fixed, fluid
        'clear' => false,
        'layouts' => [
            'subheader-v1' => 'Subheader v1',
            'subheader-v2' => 'Subheader v2',
            'subheader-v3' => 'Subheader v3',
            'subheader-v4' => 'Subheader v4',
        ],
        'style' => 'solid' // transparent, solid. can be transparent only if 'fixed' => false
    ],

    // Content
    'content' => [
        'width' => 'fluid', // fluid, fixed
        'extended' => false, // true, false
    ],

    // Brand
    'brand' => [
        'self' => [
            'theme' => 'dark' // light, dark
        ]
    ],

    // Aside
    'aside' => [
        'self' => [
            'theme' => 'dark', // light, dark
            'display' => true,
            'fixed' => true,
            'minimize' => [
                'toggle' => true, // allow toggle
                'default' => false, // default state
                'hoverable' => true //allow hover
            ]
        ],

        'menu' => [
            'dropdown' => false, // ok
            'scroll' => false, // ok
            'submenu' => [
                'accordion' => true, // true, false
                'dropdown' => [
                    'arrow' => true,
                    'hover-timeout' => 500 // in milliseconds
                ]
            ]
        ]
    ],

    // Footer
    'footer' => [
        'width' => 'fluid', // fluid, fixed
        'fixed' => false
    ],

    // Extras
    'extras' => [

        // Search
        'search' => [
            'display' => false,
            'layout' => 'dropdown', // offcanvas, dropdown
            'offcanvas' => [
                'direction' => 'right'
            ],
        ],

        // Notifications
        'notifications' => [
            'display' => false,
            'layout' => 'dropdown', // offcanvas, dropdown
            'dropdown' => [
                'style' => 'dark' // light|dark
            ],
            'offcanvas' => [
                'direction' => 'right'
            ]
        ],

        // Quick Actions
        'quick-actions' => [
            'display' => false,
            'layout' => 'dropdown', // offcanvas, dropdown
            'dropdown' => [
                'style' => 'dark' // light|dark
            ],
            'offcanvas' => [
                'direction' => 'right'
            ]
        ],

        // User
        'user' => [
            'display' => true,
            'layout' => 'dropdown', // offcanvas, dropdown
            'dropdown' => [
                'style' => 'dark' // light|dark
            ],
            'offcanvas' => [
                'direction' => 'right'
            ]
        ],

        // Languages
        'languages' => [
            'display' => true
        ],

        // Cart
        'cart' => [
            'display' => false,
            'dropdown' => [
                'style' => 'dark' // light|dark
            ]
        ],

        // Quick Panel
        'quick-panel' => [
            'display' => false,
            'offcanvas' => [
                'direction' => 'right'
            ]
        ],

        // Chat
        'chat' => [
            'display' => false,
        ],

        // Page Toolbar
        'toolbar' => [
            'display' => false
        ],

        // Scrolltop
        'scrolltop' => [
            'display' => true
        ]
    ],

    // Demo Assets
    'resources' => [
        'favicon' => 'assets/backend/themes/media/img/logo/favicon.ico',
        'fonts' => [
            'google' => [
                'families' => [
//                    'Poppins:300,400,500,600,700'
                ]
            ]
        ],

        'css' => [
            'assets/backend/themes/plugins/custom/datatables/datatables.bundle.css',
            'assets/backend/themes/plugins/global/plugins.bundle.css',
            'assets/backend/themes/plugins/custom/prismjs/prismjs.bundle.css',
            'assets/backend/themes/css/style.bundle.css',
            'assets/backend/themes/plugins/custom/bootstrap-fileinput/bootstrap-fileinput.css',
            'assets/backend/themes/plugins/custom/nestable/nestable.css',
            'assets/backend/themes/plugins/custom/jstree/jstree.bundle.css',
            'assets/backend/themes/plugins/custom/swiper-slider/swiper-bundle.min.css',
            'assets/backend/themes/css/pages/wizard/wizard-1.css',
            '/assets/backend/themes/css/style-custom.css'
        ],
        'js' => [

            'assets/backend/themes/plugins/global/plugins.bundle.js',
            'assets/backend/themes/plugins/custom/prismjs/prismjs.bundle.js',
            'assets/backend/themes/js/scripts.bundle.js',
            'assets/backend/themes/js/common.js',
            'assets/backend/themes/js/webseo.js',
            //'assets/backend/themes/plugins/custom/bootstrap-fileinput/bootstrap-fileinput.js',
            'assets/backend/themes/plugins/custom/ckeditor/ckeditor.js',
            'assets/backend/themes/plugins/custom/ckfinder-laravel/ckfinder.js',
            'assets/backend/themes/plugins/custom/nestable/jquery.nestable.js',
            'assets/backend/themes/plugins/custom/datatables/datatables.bundle.js',
            'assets/backend/themes/js/pages/crud/forms/widgets/select2.js',
            'assets/backend/themes/plugins/custom/jQuery-Mask-Plugin-master/dist/jquery.mask.js',
            'assets/backend/themes/plugins/custom/jstree/jstree.bundle.js',
            'assets/backend/themes/js/get_data_count.js',
            'assets/backend/themes/plugins/custom/swiper-slider/swiper-bundle.min.js'


            //'assets/backend/themes/js/pages/crud/forms/widgets/bootstrap-datetimepicker.js',
            //'assets/backend/themes/js/pages/crud/datatables/search-options/advanced-search.js'
        ],
    ],

];
