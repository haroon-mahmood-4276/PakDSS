<?php

return [
    'admin' => [
        'roles' => [
            'index' => 'admin.roles.index',
            'create' => 'admin.roles.create',
            'update' => 'admin.roles.update',
            'destroy' => 'admin.roles.destroy',
            'export' => 'admin.roles.export',
        ],
        'permission' => [
            'index' => 'admin.permissions.index',
            'create' => 'admin.permissions.create',
            'update' => 'admin.permissions.update',
            'destroy' => 'admin.permissions.destroy',
            'export' => 'admin.permissions.export',
            'assign-permission' => 'admin.permissions.assign-permission',
            'revoke-permission' => 'admin.permissions.revoke-permission',
        ]
    ]
];
