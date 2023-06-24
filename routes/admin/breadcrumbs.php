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
    $trail->push('Edit Permission', route('admin.permissions.edit', ['id' => $permission_id]));
});

// Categories Breadcrumbs
Breadcrumbs::for('admin.categories.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Categories', route('admin.categories.index'));
});

Breadcrumbs::for('admin.categories.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.categories.index');
    $trail->push('Create Category', route('admin.categories.create'));
});

Breadcrumbs::for('admin.categories.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.categories.index');
    $trail->push('Edit Category');
});

// Tags Breadcrumbs
Breadcrumbs::for('admin.tags.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Tags', route('admin.tags.index'));
});

Breadcrumbs::for('admin.tags.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.tags.index');
    $trail->push('Create Tag', route('admin.tags.create'));
});

Breadcrumbs::for('admin.tags.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.tags.index');
    $trail->push('Edit Tag');
});

// Brands Breadcrumbs
Breadcrumbs::for('admin.brands.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Brands', route('admin.brands.index'));
});

Breadcrumbs::for('admin.brands.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.brands.index');
    $trail->push('Create Brand', route('admin.brands.create'));
});

Breadcrumbs::for('admin.brands.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.brands.index');
    $trail->push('Edit Brand');
});

// Sellers Breadcrumbs
Breadcrumbs::for('admin.sellers.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Sellers', route('admin.sellers.index'));
});

Breadcrumbs::for('admin.sellers.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.sellers.index');
    $trail->push('Create Seller', route('admin.sellers.create'));
});

Breadcrumbs::for('admin.sellers.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.sellers.index');
    $trail->push('Edit Seller');
});

// Users Breadcrumbs
Breadcrumbs::for('admin.users.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Users', route('admin.users.index'));
});

Breadcrumbs::for('admin.users.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.users.index');
    $trail->push('Create User', route('admin.users.create'));
});

Breadcrumbs::for('admin.users.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.users.index');
    $trail->push('Edit User');
});

// Approvals Breadcrumbs
Breadcrumbs::for('admin.approvals.shops.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Approvals', route('admin.approvals.shops.index'));
    $trail->push('Shops', route('admin.approvals.shops.index'));
});

Breadcrumbs::for('admin.approvals.products.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Approvals', route('admin.approvals.products.index'));
    $trail->push('Products', route('admin.approvals.products.index'));
});

// Settings Breadcrumbs
Breadcrumbs::for('admin.settings.index', function (BreadcrumbTrail $trail, $tab) {
    $trail->parent('admin.dashboard');
    $trail->push('Settings', route('admin.settings.index', ['tab' => $tab]));
});

Breadcrumbs::for('admin.settings.tab_sites.index', function (BreadcrumbTrail $trail,  $tab) {
    $trail->parent('admin.settings.index', $tab);
    $trail->push('Site', route('admin.settings.index', ['tab' => $tab]));
});
