@extends('layouts.app')

{{--@section('title', 'Page Title')--}}

@section('content')
    <div class="services">

        <div class="row services-description-wrap">
            <div class="col-lg-6 col-md-5 col-12">
                <div class="services-img">
                    <img src="{{Storage::url('/services/elektromontazh.jpg')}}" alt="" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-6 col-md-7 col-12">
                <div class="services-description">
                    <h1 class="services-title">Электромонтажные работы</h1>
                    <div class="divider_line">
                        <div class="divider_inner divider_line1">
                        </div>
                    </div>
                    <p class="services-text">
                        Электропроводка – то, без чего человек не сможет получить доступ к средствам массовой информации и другим благам. Её проектировка и выполнение всех пунктов плана работ – ответственная задача. Электромонтажные работы в Москве должен выполнять профессионал с узкопрофильными знаниями и богатым опытом.
                    </p>
                </div>
            </div>
        </div>
        <div class="sec-title centered">
            <h2>Цены на электромонтажные работы</h2>
        </div>
        <div class="services-price-table">
            <div class="services-price-table-item">
                <div class="services-price-table-name">
                    Устройство временного электроснабжения
                </div>
                <div class="services-price-table-price">
                    <span class="price">20</span>p за м²
                </div>
            </div>
            <div class="services-price-table-item">
                <div class="services-price-table-name">
                    Диагностика электрической сети
                </div>
                <div class="services-price-table-price">
                    <span class="price">1000</span>p за ч/час
                </div>
            </div>
            <div class="services-price-table-item">
                <div class="services-price-table-name">
                    Устройство штрабы до 30х30 мм
                </div>
                <div class="services-price-table-price">
                    <span class="price">275</span>p за п.м.
                </div>
            </div>
            <div class="services-price-table-item">
                <div class="services-price-table-name">
                    Заделка штраб до 30х30 мм
                </div>
                <div class="services-price-table-price">
                    <span class="price">40</span>p за п.м.
                </div>
            </div>
            <div class="services-price-table-item">
                <div class="services-price-table-name">
                    Прокладка кабеля
                </div>
                <div class="services-price-table-price">
                    <span class="price">50</span>p за п.м.
                </div>
            </div>
            <div class="services-price-table-item">
                <div class="services-price-table-name">
                    Устройство временного электроснабжения
                </div>
                <div class="services-price-table-price">
                    <span class="price">20</span>p за м²
                </div>
            </div>
            <div class="services-price-table-item">
                <div class="services-price-table-name">
                    Диагностика электрической сети
                </div>
                <div class="services-price-table-price">
                    <span class="price">1000</span>p за ч/час
                </div>
            </div>
            <div class="services-price-table-item">
                <div class="services-price-table-name">
                    Устройство штрабы до 30х30 мм
                </div>
                <div class="services-price-table-price">
                    <span class="price">275</span>p за п.м.
                </div>
            </div>
            <div class="services-price-table-item">
                <div class="services-price-table-name">
                    Заделка штраб до 30х30 мм
                </div>
                <div class="services-price-table-price">
                    <span class="price">40</span>p за п.м.
                </div>
            </div>
            <div class="services-price-table-item">
                <div class="services-price-table-name">
                    Прокладка кабеля
                </div>
                <div class="services-price-table-price">
                    <span class="price">50</span>p за п.м.
                </div>
            </div>
            <div class="services-price-table-item">
                <div class="services-price-table-name">
                    Устройство временного электроснабжения
                </div>
                <div class="services-price-table-price">
                    <span class="price">20</span>p за м²
                </div>
            </div>
            <div class="services-price-table-item">
                <div class="services-price-table-name">
                    Диагностика электрической сети
                </div>
                <div class="services-price-table-price">
                    <span class="price">1000</span>p за ч/час
                </div>
            </div>
            <div class="services-price-table-item">
                <div class="services-price-table-name">
                    Устройство штрабы до 30х30 мм
                </div>
                <div class="services-price-table-price">
                    <span class="price">275</span>p за п.м.
                </div>
            </div>
            <div class="services-price-table-item">
                <div class="services-price-table-name">
                    Заделка штраб до 30х30 мм
                </div>
                <div class="services-price-table-price">
                    <span class="price">40</span>p за п.м.
                </div>
            </div>
            <div class="services-price-table-item">
                <div class="services-price-table-name">
                    Прокладка кабеля
                </div>
                <div class="services-price-table-price">
                    <span class="price">50</span>p за п.м.
                </div>
            </div>
            <div class="services-price-table-item">
                <div class="services-price-table-name">
                    Устройство временного электроснабжения
                </div>
                <div class="services-price-table-price">
                    <span class="price">20</span>p за м²
                </div>
            </div>
            <div class="services-price-table-item">
                <div class="services-price-table-name">
                    Диагностика электрической сети
                </div>
                <div class="services-price-table-price">
                    <span class="price">1000</span>p за ч/час
                </div>
            </div>
            <div class="services-price-table-item">
                <div class="services-price-table-name">
                    Устройство штрабы до 30х30 мм
                </div>
                <div class="services-price-table-price">
                    <span class="price">275</span>p за п.м.
                </div>
            </div>
            <div class="services-price-table-item">
                <div class="services-price-table-name">
                    Заделка штраб до 30х30 мм
                </div>
                <div class="services-price-table-price">
                    <span class="price">40</span>p за п.м.
                </div>
            </div>
            <div class="services-price-table-item">
                <div class="services-price-table-name">
                    Прокладка кабеля
                </div>
                <div class="services-price-table-price">
                    <span class="price">50</span>p за п.м.
                </div>
            </div>

        </div>


        <div class="services-portfolio-attach">
            <div class="sec-title centered">
                <h2>Из портфолио наших работ</h2>
            </div>
            <!-- Slider main container -->
            <div class="swiper-container services-portfolio-slider">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <img src="{{Storage::url('/portfolio/Монтаж-освещения.jpg')}}" class="swiper-slide" alt="services">
                    <img src="{{Storage::url('/portfolio/Проектирование-и-монтаж-слаботочных-систем.jpg')}}" class="swiper-slide" alt="services">
                    <img src="{{Storage::url('/portfolio/Прокладка-кабеля.jpg')}}" class="swiper-slide" alt="services">
                    <img src="{{Storage::url('/portfolio/Ремонт-электрики.jpg')}}" class="swiper-slide" alt="services">
                    <img src="{{Storage::url('/portfolio/Электротехнические-работы.jpg')}}" class="swiper-slide" alt="services">
                </div>
                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>

            </div>
        </div>

        @include('includes.formCallback')
    </div>
@endsection