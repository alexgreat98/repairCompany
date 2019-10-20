<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Строй компания</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
{{--<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">--}}

<!-- Styles -->
    <link href="{{mix('css/app.css')}}" rel="stylesheet">
    <link href="{{Storage::url('css/fslightbox.min.css')}}" rel="stylesheet">

    <style>
        html, body {
            background-color: whitesmoke;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            /*height: 100vh;*/
            margin: 0;
            overflow-y: auto !important;
        }
    </style>
    @if(\App\Helpers\Common\Std::getP('GOOGLE_RECAPTCHA'))
        <script src="https://www.google.com/recaptcha/api.js?render=_reCAPTCHA_site_key"></script>
    @endif
</head>
<body>
<div class="flex-center position-ref full-height @if (Route::current()->uri !== '/')padding_page_top @endif" id="app">

    <div
        class="header @if (Route::current()->uri == '/')index_page index_scroll @endif"
        id="nav_bar_scroll"
    >
        <nav class="navbar navbar-expand-md navbar-top">

            <div class="navbar-top-wrap">

                <a href="/" class="navbar-brand" title="LOGO">LOGO</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <button class="btn btn-callback" style="order: 4;">Обратный звонок</button>
                <div class="collapse navbar-collapse top__navigation order-1" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="#" class="nav-link" title="LOGO">О компании</a>
                        </li>
                        <li class="nav-item">
                            <a href="/services" class="nav-link" title="Услуги">Услуги</a>
                        </li>
                        <li class="nav-item">
                            <a href="/portfolio" class="nav-link" title="портфолио">портфолио</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" title="контакты">контакты</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    @yield('banner')

    <div class="main__app">

        <div class="main__app-wrap">
            <div class="main__wrap">
                <div class="main__wrap-content">
                    <main>
                        @yield('breadcrumbs')
                        @yield('content')
                    </main>
                </div>
            </div>
        </div>
    </div>

    <footer class="main-footer">
        <div class="main__app-wrap container-fluid">
            <!--Widgets Section-->
            <div class="widgets-section">
                <div class="row clearfix">
                    <div class="footer-column col-md-3 col-sm-6 col-xs-12">
                        <div id="text-2" class="column footer-widget widget_text">
                            <div class="textwidget">
                                <p><span style="color: #ff6600;font-size: 2rem">LOGO</span></p>
                                <p>Компания «Лого» работает на рынке ремонтов и дизайна интерьера уже много лет. За это
                                    время мы действительно научились создавать интерьеры, в которых приятно жить.</p>
                            </div>
                        </div>
                    </div>
                    <div class="footer-column col-md-3 col-sm-6 col-xs-12">
                        <div id="buildark_contact_us-2" class="column footer-widget widget_buildark_contact_us">
                            <!--Footer Column-->
                            <div class="contact-widget">
                                <h2>Контакты</h2>
                                <ul class="list-style-one">
                                    <li><span class="icon flaticon-maps-and-flags"></span>Москва, ул. Улица 10/10</li>
                                    <li><span class="icon flaticon-phone-call"></span><a href="tel:234252352">(<a
                                                href="tel:234623423">067) 123 4567</a></a><br><a
                                            href="tel:123424612">(<a href="tel:0442284600">044) 123 4567</a></a>
                                    </li>
                                    <li><span class="icon flaticon-clock-1"></span>Пн - Пт : C 10.00 до 19.00</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="footer-column col-md-3 col-sm-6 col-xs-12">
                        <div id="nav_menu-2" class="column footer-widget widget_nav_menu"><h2>Главные ссылки</h2>
                            <div class="menu-footer-menu-container">
                                <ul id="menu-footer-menu" class="menu">
                                    <li id="menu-item-2974"
                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2974">
                                        <a href="#">О Компании</a></li>
                                    <li id="menu-item-2975"
                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2975">
                                        <a href="#">Ремонт</a></li>
                                    <li id="menu-item-2977"
                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2977">
                                        <a href="#">Дизайн интерьера</a></li>
                                    <li id="menu-item-2978"
                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2978">
                                        <a href="#">Портфолио</a></li>
                                    <li id="menu-item-2979"
                                        class="menu-item menu-item-type-post_type menu-item-object-page current_page_parent menu-item-2979">
                                        <a href="#">Новости</a></li>
                                    <li id="menu-item-2980"
                                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2980">
                                        <a href="#">Контакты</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="footer-column col-md-3 col-sm-6 col-xs-12">
                        <div id="text-3" class="column footer-widget widget_text"><h2>Напишите нам</h2>
                            <div class="textwidget">
                                <p>
                                    <a href="#" rel="nofollow">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="35"
                                             height="35">
                                            <path fill="#29b6f6" d="M24 4A20 20 0 1 0 24 44A20 20 0 1 0 24 4Z"/>
                                            <path fill="#fff"
                                                  d="M33.95,15l-3.746,19.126c0,0-0.161,0.874-1.245,0.874c-0.576,0-0.873-0.274-0.873-0.274l-8.114-6.733 l-3.97-2.001l-5.095-1.355c0,0-0.907-0.262-0.907-1.012c0-0.625,0.933-0.923,0.933-0.923l21.316-8.468 c-0.001-0.001,0.651-0.235,1.126-0.234C33.667,14,34,14.125,34,14.5C34,14.75,33.95,15,33.95,15z"/>
                                            <path fill="#b0bec5"
                                                  d="M23,30.505l-3.426,3.374c0,0-0.149,0.115-0.348,0.12c-0.069,0.002-0.143-0.009-0.219-0.043 l0.964-5.965L23,30.505z"/>
                                            <path fill="#cfd8dc"
                                                  d="M29.897,18.196c-0.169-0.22-0.481-0.26-0.701-0.093L16,26c0,0,2.106,5.892,2.427,6.912 c0.322,1.021,0.58,1.045,0.58,1.045l0.964-5.965l9.832-9.096C30.023,18.729,30.064,18.416,29.897,18.196z"/>
                                        </svg>
                                    </a>
                                    <a href="#" rel="nofollow">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="35"
                                             height="35">
                                            <path fill="#fff"
                                                  d="M24,5C21.361,5,13.33,5,8.89,9.054C6.246,11.688,5,15.494,5,21v3c0,5.506,1.246,9.312,3.921,11.976 c1.332,1.215,3.148,2.186,5.368,2.857L15,39.047v5.328C15,45,15.181,45,15.241,45c0.123,0,0.32-0.039,0.694-0.371 c0.09-0.089,0.75-0.803,3.96-4.399l0.324-0.363l0.485,0.031C21.779,39.965,22.888,40,24,40c2.639,0,10.67,0,15.11-4.055 C41.753,33.311,43,29.505,43,24v-3c0-5.506-1.246-9.312-3.921-11.976C34.67,5,26.639,5,24,5z"/>
                                            <path fill="#7e57c2"
                                                  d="M33.451 28.854c-1.111-.936-1.624-1.219-3.158-2.14C29.654 26.331 28.68 26 28.169 26c-.349 0-.767.267-1.023.523C26.49 27.179 26.275 28 25.125 28c-1.125 0-3.09-1.145-4.5-2.625C19.145 23.965 18 22 18 20.875c0-1.15.806-1.38 1.462-2.037C19.718 18.583 20 18.165 20 17.816c0-.511-.331-1.47-.714-2.109-.921-1.535-1.203-2.048-2.14-3.158-.317-.376-.678-.548-1.056-.549-.639-.001-1.478.316-2.046.739-.854.637-1.747 1.504-1.986 2.584-.032.147-.051.295-.057.443-.046 1.125.396 2.267.873 3.234 1.123 2.279 2.609 4.485 4.226 6.455.517.63 1.08 1.216 1.663 1.782.566.582 1.152 1.145 1.782 1.663 1.97 1.617 4.176 3.103 6.455 4.226.958.472 2.086.906 3.2.874.159-.005.318-.023.477-.058 1.08-.238 1.947-1.132 2.584-1.986.423-.568.74-1.406.739-2.046C33.999 29.532 33.827 29.171 33.451 28.854zM34 24c-.552 0-1-.448-1-1v-1c0-4.962-4.038-9-9-9-.552 0-1-.448-1-1s.448-1 1-1c6.065 0 11 4.935 11 11v1C35 23.552 34.552 24 34 24zM27.858 22c-.444 0-.85-.298-.967-.748-.274-1.051-1.094-1.872-2.141-2.142-.535-.139-.856-.684-.718-1.219.138-.534.682-.855 1.219-.718 1.748.453 3.118 1.822 3.575 3.574.139.535-.181 1.08-.715 1.22C28.026 21.989 27.941 22 27.858 22z"/>
                                            <path fill="#7e57c2"
                                                  d="M31,23c-0.552,0-1-0.448-1-1c0-3.188-2.494-5.818-5.678-5.986c-0.552-0.029-0.975-0.5-0.946-1.051 c0.029-0.552,0.508-0.976,1.051-0.946C28.674,14.241,32,17.748,32,22C32,22.552,31.552,23,31,23z"/>
                                            <path fill="#7e57c2"
                                                  d="M24,4C19.5,4,12.488,4.414,8.216,8.316C5.196,11.323,4,15.541,4,21c0,0.452-0.002,0.956,0.002,1.5 C3.998,23.043,4,23.547,4,23.999c0,5.459,1.196,9.677,4.216,12.684c1.626,1.485,3.654,2.462,5.784,3.106v4.586 C14,45.971,15.049,46,15.241,46h0.009c0.494-0.002,0.921-0.244,1.349-0.624c0.161-0.143,2.02-2.215,4.042-4.481 C21.845,40.972,22.989,41,23.999,41c0,0,0,0,0,0s0,0,0,0c4.5,0,11.511-0.415,15.784-4.317c3.019-3.006,4.216-7.225,4.216-12.684 c0-0.452,0.002-0.956-0.002-1.5c0.004-0.544,0.002-1.047,0.002-1.5c0-5.459-1.196-9.677-4.216-12.684C35.511,4.414,28.5,4,24,4z M41,23.651l0,0.348c0,4.906-1.045,8.249-3.286,10.512C33.832,38,26.437,38,23.999,38c-0.742,0-1.946-0.001-3.367-0.1 C20.237,38.344,16,43.083,16,43.083V37.22c-2.104-0.505-4.183-1.333-5.714-2.708C8.045,32.248,7,28.905,7,23.999l0-0.348 c0-0.351-0.001-0.73,0.002-1.173C6.999,22.078,6.999,21.7,7,21.348L7,21c0-4.906,1.045-8.249,3.286-10.512 C14.167,6.999,21.563,6.999,24,6.999c2.437,0,9.832,0,13.713,3.489c2.242,2.263,3.286,5.606,3.286,10.512l0,0.348 c0,0.351,0.001,0.73-0.002,1.173C41,22.922,41,23.3,41,23.651z"/>
                                        </svg>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="footer__copyright">Copyright © 2019 лого , All Right Reserved</div>
</div>
</body>
<script src="{{ mix('/js/app.js') }}" async></script>
<script src="{{Storage::url('js/fslightbox.min.js')}}"></script>
</html>
