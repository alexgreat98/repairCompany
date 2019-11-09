@extends('layouts.app')

@section('head')
    <title>Услуги компании ООО «Строй-Комплект» | Калькулятор услуг</title>
    <meta name="description"
          content="Услуги ООО «Строй-Комплект». Выберите вид работ и расчитайте примерную стоимость работ.">
    <meta name="keywords"
          content="Строительная компания, Москва, Ремонт, Под ключ, Строительство, калькулятор услуг, стоительные услуги">
@endsection
@section('breadcrumbs', Breadcrumbs::render('services'))
@section('content')
    <div class="services__list">

        <div class="services__list-banner jumbotron">
            <h1 class="services__list-banner-title">Ремонтные работы под ключ</h1>
            <p class="lead">Мы создаём уют</p>
            <hr>
            <p class="lead">Выберите услугу и расчитайте примерную стоимость работ</p>
        </div>
        <div class="services__list-list">
            @foreach($services as $service)
                <div class="services__list-item">
                    <div class="services__list-item-name">{{$service->name}}</div>
                    <div class="services__list-item-description">
                        <div class="services__list-item-price">
                            @if($service->price)
                                <span class="before">От</span>
                                <span class="type">р</span>
                                <span class="price">{{$service->price->price}}</span>
                                <span class="unit">{{$service->price->type}}</span>
                            @else
                                <span>Цену уточняйте</span>
                            @endif
                        </div>
                        <div class="services__list-item-description-text">
                            Цены на {{ $service->name }} и примерный подбор цен на {{ $service->name }}.
                            Расчитайте примерную сумму за работы
                        </div>
                    </div>
                    <div class="services__list-item-btn">
                        <a href="/services/{{$service->slug}}" class="btn btn-secondary">Подробнее</a>
                    </div>
                </div>
            @endforeach
        </div>
        <callback-client></callback-client>
    </div>
@endsection
