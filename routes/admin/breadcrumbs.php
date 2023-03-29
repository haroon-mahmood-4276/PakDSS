<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;


Breadcrumbs::for('admin.dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('admin.dashboard.index'));
});

// Roles Breadcrumbs
Breadcrumbs::for('admin.roles.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Roles', route('admin.roles.index'));
});

Breadcrumbs::for('admin.roles.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.roles.index');
    $trail->push('Create Role', route('admin.roles.create'));
});

Breadcrumbs::for('admin.roles.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.roles.index');
    $trail->push('Edit Role');
});

// Permisisons Breadcrumbs
Breadcrumbs::for('admin.permissions.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Permissions', route('admin.permissions.index'));
});

Breadcrumbs::for('admin.permissions.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.permissions.index');
    $trail->push('Create Permission', route('admin.permissions.create'));
});

Breadcrumbs::for('admin.permissions.edit', function (BreadcrumbTrail $trail, $permission_id) {
    $trail->parent('admin.permissions.index');
    $trail->push('Edit Permission',  route('admin.permissions.edit', ['id' => $permission_id]));
});
