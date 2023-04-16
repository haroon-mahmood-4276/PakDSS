<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('seller.dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('seller.dashboard.index'));
});

Breadcrumbs::for('seller.brands.index', function (BreadcrumbTrail $trail) {
    $trail->parent('seller.dashboard');
    $trail->push('Brands', route('seller.brands.index'));
});

Breadcrumbs::for('seller.categories.index', function (BreadcrumbTrail $trail) {
    $trail->parent('seller.dashboard');
    $trail->push('Categories', route('seller.categories.index'));
});

Breadcrumbs::for('seller.shops.index', function (BreadcrumbTrail $trail) {
    $trail->parent('seller.dashboard');
    $trail->push('Shops', route('seller.shops.index'));
});

Breadcrumbs::for('seller.shops.create', function (BreadcrumbTrail $trail) {
    $trail->parent('seller.shops.index');
    $trail->push('Create Shop', route('seller.shops.create'));
});

Breadcrumbs::for('seller.shops.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('seller.shops.index');
    $trail->push('Edit Shop');
});
