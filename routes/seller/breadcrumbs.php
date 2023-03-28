<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;


Breadcrumbs::for('seller.dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('seller.dashboard.index'));
});

// Roles Breadcrumbs
Breadcrumbs::for('seller.roles.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Roles', route('roles.index'));
});

Breadcrumbs::for('seller.roles.create', function (BreadcrumbTrail $trail) {
    $trail->parent('roles.index');
    $trail->push('Create Role', route('roles.create'));
});

Breadcrumbs::for('seller.roles.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('roles.index');
    $trail->push('Edit Role');
});

// Permisisons Breadcrumbs
Breadcrumbs::for('seller.permissions.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Permissions', route('permissions.index'));
});

Breadcrumbs::for('seller.permissions.create', function (BreadcrumbTrail $trail) {
    $trail->parent('permissions.index');
    $trail->push('Create Permission', route('permissions.create'));
});

Breadcrumbs::for('seller.permissions.edit', function (BreadcrumbTrail $trail, $permission_id) {
    $trail->parent('permissions.index');
    $trail->push('Edit Permission',  route('permissions.edit', ['id' => $permission_id]));
});
