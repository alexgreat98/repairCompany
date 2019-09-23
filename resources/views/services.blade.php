@extends('layouts.app')

{{--@section('title', 'Page Title')--}}

@section('content')
    <ul class="breadcrumbs">
        <li class="B_firstCrumb" itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb"><a class="B_homeCrumb" itemprop="url" rel="Home" href="https://dev-stroy.ru/"><span itemprop="title">Главная</span></a></li>
        <li itemscope="itemscope" class="B_crumb" itemtype="http://data-vocabulary.org/Breadcrumb"><a class="B_crumb" itemprop="url" href="uslugi"><span itemprop="title">Услуги</span></a></li>
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
            @for ($i = 0; $i < 12; $i++)
                <div class="services__list-item">
                    <div class="services__list-item-name">Электромонтажные работы</div>
                    <div class="services__list-item-description">
                        <div class="services__list-item-price">
                            <span class="before">От</span>
                            <span class="type">р</span>
                            <span class="price">20</span>
                            <span class="unit">м²</span>
                        </div>
                        <div class="services__list-item-description-text">
                            Электромонтажные работы в Москве должен выполнять профессионал с узкопрофильными знаниями и богатым опытом.
                        </div>
                    </div>
                    <div class="services__list-item-btn">
                        <a href="/services/electro" class="btn btn-secondary">Подробнее</a>
                    </div>
                </div>
            @endfor
        </div>
        @include('includes.formCallback')
    </div>
@endsection