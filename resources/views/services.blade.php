@extends('layouts.app')

{{--@section('title', 'Page Title')--}}

@section('content')
    <ul class="breadcrumbs">
        <li class="B_firstCrumb" itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb"><a
                class="B_homeCrumb" itemprop="url" rel="Home" href="#"><span itemprop="title">Главная</span></a></li>
        <li itemscope="itemscope" class="B_crumb" itemtype="http://data-vocabulary.org/Breadcrumb"><a class="B_crumb"
                                                                                                      itemprop="url"
                                                                                                      href="uslugi"><span
                    itemprop="title">Услуги</span></a></li>
        <li>Электромонтажные работы</li>
    </ul>
    <div class="services__list">

        <div class="services__list-banner jumbotron">
            <h1 class="services__list-banner-title">Ремонтные работы под ключ</h1>
            <p class="lead">Мы создаём уют</p>
            <hr>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            {{--<p class="lead">
                <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
            </p>--}}
        </div>
        <div class="services__list-list">
            @foreach($services as $service)
                <div class="services__list-item">
                    <div class="services__list-item-name">{{$service->name}}</div>
                    <div class="services__list-item-description">
                        <div class="services__list-item-price">
                            <span class="before">От</span>
                            <span class="type">р</span>
                            <span class="price">{{$service->price->price}}</span>
                            <span class="unit">{{$service->price->type}}</span>
                        </div>
                        <div class="services__list-item-description-text">
                            {!! $service->text !!}
                        </div>
                    </div>
                    <div class="services__list-item-btn">
                        <a href="/services/{{$service->slug}}" class="btn btn-secondary">Подробнее</a>
                    </div>
                </div>
            @endforeach
        </div>
        @include('includes.formCallback')
    </div>
@endsection
