<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use Illuminate\Support\Str;

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

Breadcrumbs::for('seller.products.index', function (BreadcrumbTrail $trail) {
    $trail->parent('seller.dashboard');
    $trail->push('Products', route('seller.products.index'));
});

Breadcrumbs::for('seller.products.create', function (BreadcrumbTrail $trail) {
    $trail->parent('seller.products.index');
    $trail->push('Create Product');
});

Breadcrumbs::for('seller.products.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('seller.products.index');
    $trail->push('Edit Product');
});

Breadcrumbs::for('seller.requests.index', function (BreadcrumbTrail $trail, $request) {
    $trail->parent('seller.dashboard');
    $trail->push('Requests', route('seller.requests.index', ['request' => $request]));
    $trail->push(Str::of($request)->ucfirst(), route('seller.requests.index', ['request' => $request]));
});

Breadcrumbs::for('seller.requests.create', function (BreadcrumbTrail $trail) {
    $trail->parent('seller.requests.index');
    $trail->push('Create Request');
});

Breadcrumbs::for('seller.requests.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('seller.requests.index');
    $trail->push('Edit Request');
});
