@extends('layouts.app')

@section('head')
    <title>ООО «Строй-Комплект» | {{ $service->name }} под ключ</title>
    <meta name="description"
          content="Компания ООО «Строй-Комплект» выполняет {{ $service->name }} под ключ в кротчайшие сроки. Расчитайте примерную стоимость работ для {{ $service->name }}.">
    <meta name="keywords" content="Строительная компания, Москва, Ремонт, Под ключ, Строительство">
@endsection
@section('breadcrumbs', Breadcrumbs::render('service', $service))
@section('content')
    <div class="services">

        <div class="row services-description-wrap">
            <div class="col-lg-6 col-md-5 col-12">
                <div
                    class="services-img"
                    style="background: transparent url({{Storage::url('services/'.$service->image)}}) center center/cover no-repeat scroll;"
                >
{{--                    <img src="{{Storage::url('/services/'.$service->image)}}" alt="" class="img-fluid">--}}
                </div>
            </div>
            <div class="col-lg-6 col-md-7 col-12">
                <div class="services-description">
                    <h1 class="services-title">{{ $service->name }}</h1>
                    <div class="divider_line">
                        <div class="divider_inner divider_line1">
                        </div>
                    </div>
                    <div class="services-text">{!! $service->text !!}</div>
                </div>
            </div>
        </div>
        <div class="sec-title centered">
            <h2 class="sec-title-header line">Цены на {{ $service->name }}</h2>
            <div class="sec-title-text">
                <h4 class="title-text">Примерный подбор цен на {{ $service->name }}. Расчитайте примерную сумму за
                    работы</h4>
            </div>
        </div>

        <prices-client :prices="{{$service->prices}}"></prices-client>

        @if(sizeof($service->images))
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
        @endif
        <callback-client></callback-client>
    </div>
@endsection

