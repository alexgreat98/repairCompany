@extends('layouts.app')

{{--@section('title', 'Page Title')--}}

@section('content')
    <ul class="breadcrumbs">
        <li class="B_firstCrumb" itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb"><a
                    class="B_homeCrumb" itemprop="url" rel="Home" href="#"><span itemprop="title">Главная</span></a>
        </li>
        <li itemscope="itemscope" class="B_crumb" itemtype="http://data-vocabulary.org/Breadcrumb"><a class="B_crumb"
                                                                                                      itemprop="url"
                                                                                                      href="uslugi"><span
                        itemprop="title">Услуги</span></a></li>
        <li>Офис</li>
    </ul>
    <div class="portfolio__list">
        <div class="sec-title centered">
            <h1 class="title">Портфолио</h1>
        </div>
        <div class="portfolio__list-list">
            <div class="row">
                <div class="col-md-6">
                    <div class="portfolio__list-item">
                        <a href="/portfolio/item" class="project-img text-center"
                           style="background-image: url({{Storage::url('portfolio/sdfbd2f.jpg')}});">

                        </a>
                        <div class="desc row align-items-center">
                            <h3>
                                <div class="float-left">
                                    <a href="/portfolio/item">Cемейный дом</a>
                                </div>
                                <div class="float-right">
                                    <a href="/portfolio/item" class="text-main">
                                        Подробнее
                                    </a>
                                </div>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="portfolio__list-item">
                        <a href="/portfolio/item" class="project-img text-center"
                           style="background-image: url({{Storage::url('portfolio/sdfbd2f.jpg')}});">

                        </a>
                        <div class="desc row align-items-center">
                            <h3>
                                <div class="float-left">
                                    <a href="/portfolio/item">Кухня</a>
                                </div>
                                <div class="float-right">
                                    <a href="/portfolio/item" class="text-main">
                                        Подробнее
                                    </a>
                                </div>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="portfolio__list-item">
                        <a href="/portfolio/item" class="project-img text-center"
                           style="background-image: url({{Storage::url('portfolio/sdfbd2f.jpg')}});">

                        </a>
                        <div class="desc row align-items-center">
                            <h3>
                                <div class="float-left">
                                    <a href="/portfolio/item">Ванная комната</a>
                                </div>
                                <div class="float-right">
                                    <a href="/portfolio/item" class="text-main">
                                        Подробнее
                                    </a>
                                </div>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="portfolio__list-item">
                        <a href="/portfolio/item" class="project-img text-center"
                           style="background-image: url({{Storage::url('portfolio/sdfbd2f.jpg')}});">

                        </a>
                        <div class="desc row align-items-center">
                            <h3>
                                <div class="float-left">
                                    <a href="/portfolio/item">СОВРЕМЕННАЯ КВАРТИРА</a>
                                </div>
                                <div class="float-right">
                                    <a href="/portfolio/item" class="text-main">
                                        Подробнее
                                    </a>
                                </div>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="portfolio__list-text">
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
        @include('includes.formCallback')
    </div>
@endsection