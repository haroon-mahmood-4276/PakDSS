<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;


Breadcrumbs::for('user.home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('user.home.index'));
});

// // Roles Breadcrumbs
// Breadcrumbs::for('user.roles.index', function (BreadcrumbTrail $trail) {
//     $trail->parent('home');
//     $trail->push('Roles', route('roles.index'));
// });

// Breadcrumbs::for('user.roles.create', function (BreadcrumbTrail $trail) {
//     $trail->parent('roles.index');
//     $trail->push('Create Role', route('roles.create'));
// });

// Breadcrumbs::for('user.roles.edit', function (BreadcrumbTrail $trail) {
//     $trail->parent('roles.index');
//     $trail->push('Edit Role');
// });

// // Permisisons Breadcrumbs
// Breadcrumbs::for('user.permissions.index', function (BreadcrumbTrail $trail) {
//     $trail->parent('home');
//     $trail->push('Permissions', route('permissions.index'));
// });

// Breadcrumbs::for('user.permissions.create', function (BreadcrumbTrail $trail) {
//     $trail->parent('permissions.index');
//     $trail->push('Create Permission', route('permissions.create'));
// });

// Breadcrumbs::for('user.permissions.edit', function (BreadcrumbTrail $trail, $permission_id) {
//     $trail->parent('permissions.index');
//     $trail->push('Edit Permission',  route('permissions.edit', ['id' => $permission_id]));
// });
