<?php

Breadcrumbs::for('home', function ($trail) {
    $trail->push('Главная', route('home'));
});

Breadcrumbs::for('services', function ($trail) {
    $trail->parent('home');
    $trail->push('Услуги', route('services'));
});

// Home > services > [service]
Breadcrumbs::for('service', function ($trail, $service) {
    $trail->parent('services');
    $trail->push($service->name, route('service', $service));
});

Breadcrumbs::for('portfolio', function ($trail) {
    $trail->parent('home');
    $trail->push('Портфолио', route('portfolio'));
});

// Home > portfolio > [portfolio]
Breadcrumbs::for('portfolio.item', function ($trail, $portfolio) {
    $trail->parent('portfolio');
    $trail->push($portfolio->name, route('portfolio.item', $portfolio));
});
