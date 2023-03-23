<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;


Breadcrumbs::for('vendor.dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('vendor.dashboard.index'));
});

// Roles Breadcrumbs
Breadcrumbs::for('vendor.roles.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Roles', route('roles.index'));
});

Breadcrumbs::for('vendor.roles.create', function (BreadcrumbTrail $trail) {
    $trail->parent('roles.index');
    $trail->push('Create Role', route('roles.create'));
});

Breadcrumbs::for('vendor.roles.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('roles.index');
    $trail->push('Edit Role');
});

// Permisisons Breadcrumbs
Breadcrumbs::for('vendor.permissions.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Permissions', route('permissions.index'));
});

Breadcrumbs::for('vendor.permissions.create', function (BreadcrumbTrail $trail) {
    $trail->parent('permissions.index');
    $trail->push('Create Permission', route('permissions.create'));
});

Breadcrumbs::for('vendor.permissions.edit', function (BreadcrumbTrail $trail, $permission_id) {
    $trail->parent('permissions.index');
    $trail->push('Edit Permission',  route('permissions.edit', ['id' => $permission_id]));
});
