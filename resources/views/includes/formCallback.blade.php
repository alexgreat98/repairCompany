<div class="main-callback-form-center">
    <div class="main-callback-form">
        <div class="main-callback-form-img" style="background-image: url('{{Storage::url('site/mainForm.jpg')}}');">
            {{--<img class="img-fluid" style="background-image: {{Storage::url('/site/mainForm.jpg')}};" alt="Оставьте заявку">--}}
        </div>
        <div class="main-callback-form-wrap">
            <div class="main-callback-form-title">
                Доверьте дело профессионалам!
            </div>
            <div class="main-callback-form-description">
                Оставьте свои контактные данные и мы сами свяжемся с вами
            </div>
            <div class="main-callback-form-inputs">
                <form action="/">
                    <label>
                        <span>Как к вам обращаться</span>
                        <input type="text" placeholder="Имя">
                    </label>
                    <label>
                        <span>Контактный номер</span>
                        <input type="text" placeholder="Телефон">
                    </label>
                    <button class="btn-primary" type="submit">Оставить заявку</button>
                </form>
            </div>
        </div>
    </div>
</div>
