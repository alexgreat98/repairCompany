@extends('layouts.app')
@section('head')
    <title>Компания ООО «Строй-Комплект» | Ремонт под ключ</title>
    <meta name="description"
          content="Компания ООО «Строй-Комплект» предоставляет услуги по ремонту и обслуживанию офисов и жилых помещений под ключ">
    <meta name="keywords" content="Строительная компания, Москва, Ремонт, Под ключ, Строительство">
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in!
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
