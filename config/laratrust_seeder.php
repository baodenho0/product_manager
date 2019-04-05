<?php

return [
    'role_structure' => [
        'superadmin' => [
            'users' => 'c,r,u,d',
            'acl' => 'c,r,u,d',
            'profile' => 'r,u',
            'roles'=> 'c,r,u,d',
            'permissions'=> 'c,r,u,d',
            'menus'=> 'c,r,u,d',
            'products'=> 'c,r,u,d',
            'imports'=> 'c,r,u,d',
            'exports'=> 'c,r,u,d',
            'contracts'=>'c,r,u,d',
        ],
        'admin' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'user' => [
            'profile' => 'r,u'
        ],
    ],
    'permission_structure' => [],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
