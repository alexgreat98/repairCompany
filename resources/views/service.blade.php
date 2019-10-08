@extends('layouts.app')

{{--@section('title', 'Page Title')--}}

@section('content')
    <ul class="breadcrumbs">
        <li class="B_firstCrumb" itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">
            <a class="B_homeCrumb" itemprop="url" rel="Home" href="#"><span itemprop="title">Главная</span></a></li>
        <li itemscope="itemscope" class="B_crumb" itemtype="http://data-vocabulary.org/Breadcrumb">
            <a class="B_crumb" itemprop="url" href="#"><span itemprop="title">Услуги</span></a></li>
        <li>Электромонтажные работы</li>
    </ul>
    <div class="services">

        <div class="row services-description-wrap">
            <div class="col-lg-6 col-md-5 col-12">
                <div class="services-img">
                    <img src="{{Storage::url('/services/elektromontazh.jpg')}}" alt="" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-6 col-md-7 col-12">
                <div class="services-description">
                    <h1 class="services-title">{{ $service->name }}</h1>
                    <div class="divider_line">
                        <div class="divider_inner divider_line1">
                        </div>
                    </div>
                    <p class="services-text">{!! $service->text !!}</p>
                </div>
            </div>
        </div>
        <div class="sec-title centered">
            <h2 class="title">Цены на {{ $service->name }}</h2>
        </div>
        <div class="services-price-table">
            @foreach($service->prices as $price)
                <div class="services-price-table-item">
                    <div class="services-price-table-name">
                        {{$price->name}}
                    </div>
                    <div class="services-price-table-price">
                        <span class="price">{{$price->price}}</span>p за {{$price->type}}
                    </div>
                </div>
            @endforeach


        </div>


        <div class="services-portfolio-attach">
            <div class="sec-title centered">
                <h2 class="title">Из портфолио наших работ</h2>
            </div>
            <!-- Slider main container -->
            <div class="swiper-container services-portfolio-slider">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    @foreach($service->images as $image)
                        <a class="swiper-slide" href="{{Storage::url('portfolio/'.$image->url)}}"
                           data-fslightbox="example-gallery">
                            <img src="{{Storage::url('portfolio/prev-'.$image->url)}}"
                                 data-fslightbox="example-gallery"
                                 alt="services" class="img-fluid">
                        </a>
                    @endforeach
                </div>
                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>

            </div>
        </div>

        @include('includes.formCallback')
    </div>
@endsection
