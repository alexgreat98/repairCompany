@extends('layouts.app')
@section('breadcrumbs', Breadcrumbs::render('portfolio.item', $portfolio))
@section('content')
    <div class="portfolio__item">
        <div class="sec-title centered">
            <h1 class="title">{{$portfolio->name}}</h1>
        </div>
        <div class="row">
            @foreach($portfolio->images as $image)
                <div class="col-lg-4 col-md-6">
                    <div class="portfolio__item-item">


                            <a class=" single-work project-img"
                               style="background-image: url({{Storage::url('portfolio/prev-'.$image->url)}});"
                               href="{{Storage::url('portfolio/'.$image->url)}}" data-fslightbox="example-gallery"
                               title="Кухня">
{{--                                <span class="icon"><i class="icon-search2"></i></span>--}}
                            </a>

                    </div>
                </div>
            @endforeach

        </div>


        <div class="portfolio__item-text">
            Наша компания предлагает полный комплекс ремонтных и строительных работ, включая: проектирование;
            реконструкцию; электромонтаж; отделочные, фасадные работы и т. д. География нашей деятельности охватывает
            Москву и МО. Представляем вашему вниманию проекты домов, которые были разработаны и успешно выполнены
            командой. А также предлагаем ознакомиться с примерами фасадных, кровельных, отделочных и многих других
            работ. Наше портфолио является наглядным подтверждением того, что мы никогда не боимся трудностей, с
            энтузиазмом и удовольствием берёмся даже за самую сложную работу, к каждой задаче подходим со всей
            ответственностью, профессионализмом и любовью к своему делу. Грандиозный опыт работы и множество успешных
            проектов – именно поэтому мы смело гарантируем наилучший результат. Свяжитесь с нами уже сейчас, чтобы
            воспользоваться услугами и убедиться в этом лично. Сделаем всё, чтобы вы остались довольны!
        </div>


        <div class="portfolio__list-list">
            <div class="sec-title centered">
                <h1 class="title">Похожие работы</h1>
            </div>
            <div class="row">
                @foreach($portfolio['relative'] as $portfolio)
                    <div class="col-md-4">
                        <div class="portfolio__list-item">
                            <a href="/portfolio/{{$portfolio->slug}}" class="project-img text-center"
                               style="background-image: url({{Storage::url('portfolio/prev-'.$portfolio->image->url)}});">
                            </a>
                            <div class="desc row align-items-center">
                                <div>
                                    <h3 class="float-left">
                                        <a href="/portfolio/{{$portfolio->slug}}">{{$portfolio->name}}</a>
                                    </h3>
                                    <div class="float-right">
                                        <a href="/portfolio/{{$portfolio->id}}" class="text-main">
                                            Подробнее
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
        <callback-client></callback-client>
    </div>
@endsection
