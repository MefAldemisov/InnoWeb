<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="HeaderFriendly" content="true">
    <meta name="MobileOptimized" content="width">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="description" content="">
    <meta name="author" content="Bogdanova Alina">
    <title>Cinema</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css" />
    <link rel="stylesheet" type="text/css" href="css/fonts.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/form.css" />
    <link rel="stylesheet" type="text/css" href="css/mobile.css" />
    <link rel="stylesheet" href="css/owl.carousel.min.css" />
    <link rel="stylesheet" href="css/owl.theme.default.min.css" />

</head>

<body>
    <header>
        <section class="header__content">
            <div id="first-line" class="header__first-line">
                <div class='header__logo-container'>
                    <a href="http://university.innopolis.ru" target="_blank">
                        <img class="header__inno-logo" src="images/logo_inno.png" alt="logo of Innopolis" title="Университет Иннополис">
                    </a>
                </div>
                <div class="header__first-line_right">
                    <nav>
                        <div class="header__menu-button">
                            <hr class="header__menu-button-line">
                            <hr class="header__menu-button-line">
                            <hr class="header__menu-button-line">
                        </div>
                        <ul>
                            <li><a class="link-menu" href="#tikets_table">ЗАКАЗАТЬ БИЛЕТ</a></li>
                            <li><a class="link-menu" href="#section_benefits">ПРЕИМУЩЕСТВА</a></li>
                            <li><a class="link-menu" href="#section_films">ФИЛЬМЫ</a></li>
                            <li><a class="link-menu" href="#section_contacts">КОНТАКТЫ</a></li>
                        </ul>
                    </nav>
                    <div class="header__location-box">
                        Ваш город: <span class="header__location" id="location-city"><i>unknown</i></span>
                    </div>
                </div>
            </div>
            <div class="header__main-titles">
                <h1>Закажите билет в кино</h1>
                <h2 class="header__subtitle">Всем покупателям подарок!</h2>
            </div>
        </section>
    </header>
    <div id="city-modal" class="select-city__modal hidden-modal">
        <h4>Выберите ваш город</h4>
        <input type="text" value="" name="city_choose" />
        <div id="search_suggestions"></div>
    </div>
    <div class="welcome__container">
        <section class="welcome">

            <h2 class="welcome__header">Добро пожаловать!</h2>
            <p>Cumque dolorem eum harum laudantium libero molestias saepe soluta?
                Facere minima optio perferendis quibusdam
                quis reprehenderit, saepe! Debitis enim optio saepe voluptatibus.</p>
            <p>Cumque dolorem eum harum laudantium libero molestias saepe soluta? Facere minima optio perferendis
                quibusdam
                quis reprehenderit, saepe! Debitis enim optio saepe voluptatibus.</p>
        </section>
    </div>
    <button id="up" class="btn__to-top">Up</button>
    <section id="section_benefits" class="benefits">
        <h2 class="benefits__header">Почему мы?</h2>
        <div class="benefits__container">
            <article class="benefits__benefit benefits__first-benefit">
                <div class="benefits__img-container">
                    <img class="benefits__img" src="images/b2_icon_1.jpg" alt="a colorful filmstrip">
                </div>
                <h3 class="benefits__benefit-name">Большие экраны</h3>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. At autem cum dolores dolorum eius error
                    expedita
                    illum itaque molestiae mollitia nemo, nostrum officia quas ratione tempora temporibus veritatis vero
                    voluptates.
                </p>
            </article>
            <article class="benefits__benefit">
                <div class="benefits__img-container">
                    <img class="benefits__img" src="images/b2_icon_2.jpg" alt="a big loudspeaker">
                </div>
                <h3 class="benefits__benefit-name">Объемный звук</h3>
                <p>Lorem ipsum dolor sit amet.</p>
            </article>
            <article class="benefits__benefit" title="Нажми на меня, чтобы увидеть интерьер">
                <div class="benefits__img-container">
                    <img id="albom_shower" class="benefits__img" src="images/b2_icon_3.jpg" alt="a comfortable sofa">
                </div>
                <h3 class="benefits__benefit-name">Удобные кресла</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At autem cum dolores dolorum eius error
                    expedita
                    illum itaque molestiae mollitia nemo, nostrum officia quas ratione tempora temporibus veritatis vero
                    voluptates.</p>
            </article>
        </div>
    </section>
    <section class="albom__container" id="albom">
        <div class="albom__inner owl-carousel">
            <img class="albom__img" src="images/places1.jpeg">
            <img class="albom__img" src="images/places2.jpeg">
            <img class="albom__img" src="images/places3.jpeg">
            <img class="albom__img" src="images/places4.jpeg">
            <img class="albom__img" src="images/places5.jpeg">
        </div>
    </section>
    <section id="tikets_table" class="timetable">
        <h2 class="timetable__header">Выберите фильм</h2>
        <div class="timetable__table-container">
            <table>
                <thead>
                    <tr>
                        <th><a href="#">Начало сеанса</a></th>
                        <th><a href="#">Название фильма</a></th>
                        <th><a href="#">Описание</a></th>
                        <th><a href="#">Год выпуска</a></th>
                        <th><a href="#">Стоимость билета</a></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="timetable__rows">
                </tbody>
            </table>
        </div>
        <div class="timetable__footer">
            <p>Please keep in mind that the timings may differ
                according to the flow of the event. The even is actually day long and we do
                plan to finish it within our set time but it doesn’t have to be,
                if we all agree to hangour for some time more, what harm could it do? :)
            </p>
        </div>
    </section>

    <section class="present">
        <div class="background-triangle"></div>
        <div class="present__text-container">
            <img class="present__icon" src="images/b4_img.jpg" alt="a big present box">
            <article class="present__text">
                <h2 class="present__header">Подарок каждому!</h2>
                <p>
                    Are you an Elite author in the Envato Marketplaces?
                    If so we are proud of you! We want to give our thanks in
                    achieving great success in the marketplace and we want to
                    make known to the people of our country that you are amazing!
                    Our Elite gifting program includes giving you special merchandize
                    from our community and also promote your works in our community.
                </p>
                <p>
                    All you have to do is contact us by clicking the button here
                    and then its just going to the event, saying something
                    motivational and taking that swag while looking amazing
                    infront of thousands of other community members.
                </p>
                <p>
                    *Be advised, we will only give you Elite thank you swag for each
                    level of elite you cross. <br>That means if you do not cross to the
                    next elite level before the next event, you cannot claim your
                    prizes.
                </p>
                <button id="send__present" class="present__button">Получить подарок</button>
            </article>

        </div>
        <div class="background-triangle"></div>
    </section>
    <section id="section_films" class="films">
        <article class="films__text">
            <h2 class="films__header">Фильмы</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci alias, animi, commodi eius
                ipsum,
                laudantium neque nihil omnis perferendis sed sequi tempore! Ad ea esse ex inventore repudiandae,
                suscipit!</p>
        </article>
        <div class="films__buttons">
            <div class="films__btn-before"></div>
            <div class="films__btn-after"></div>
        </div>
        <div class="films__container owl-carousel">
        </div>
    </section>
    <section class="map">
        <iframe src="https://yandex.ru/map-widget/v1/-/CGHPaZ77" width="100%" height="100%" frameborder="1" allowfullscreen="true"></iframe>
        <!-- <img class="map__img" src="./images/06_map-footer.jpg" alt="map"> -->
    </section>
    <footer id="section_contacts" class="contacts__container">
        <div class="contacts">
            <div class="contacts__icons">
                <a href="https://twitter.com" target="_blank" title="Facebook social network">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="48" height="48" viewBox="0 0 48 48">
                        <path d="M24.000,46.499 C11.573,46.499 1.500,36.426 1.500,24.000 C1.500,11.573 11.573,1.500 24.000,1.500 C36.426,1.500 46.500,11.573 46.500,24.000 C46.500,36.426 36.426,46.499 24.000,46.499 ZM24.544,11.670 C19.462,11.670 20.620,17.699 20.451,19.897 C20.451,19.914 17.344,19.897 17.344,19.897 L17.344,23.988 L20.442,23.988 L20.442,38.384 L25.589,38.384 L25.578,23.988 L29.026,23.988 L29.702,19.875 L25.589,19.920 C25.589,17.000 25.363,15.812 27.070,15.812 C27.223,15.812 29.719,15.806 29.719,15.806 L29.724,11.670 L24.544,11.670 Z" class="svg-icon" />
                    </svg>
                </a>
                <a href="https://www.facebook.com" target="_blank" title="Twitter social network">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="49" height="48.03" viewBox="0 0 49 48.03">
                        <path d="M24.506,46.520 C12.080,46.520 2.006,36.446 2.006,24.020 C2.006,11.593 12.080,1.520 24.506,1.520 C36.932,1.520 47.006,11.593 47.006,24.020 C47.006,36.446 36.932,46.520 24.506,46.520 ZM36.468,21.794 C34.730,15.744 30.554,15.744 30.554,15.744 C30.554,15.744 32.327,14.738 32.275,14.125 C31.730,13.733 30.636,14.517 30.544,14.517 C30.820,14.323 30.656,13.771 30.298,13.562 C29.770,13.614 29.310,14.585 29.310,14.585 C29.310,14.585 29.051,14.108 28.816,14.108 C26.021,14.875 24.052,21.326 24.061,21.334 C14.934,15.173 14.329,16.358 14.329,16.375 C13.613,17.977 16.391,20.005 16.391,20.005 L15.597,20.029 C15.597,20.029 14.430,19.990 14.685,20.824 C14.945,21.889 16.329,22.993 16.340,23.005 C17.022,23.328 17.874,23.021 17.874,23.021 C17.874,23.021 16.971,23.493 16.399,23.850 C15.457,24.459 16.134,24.999 16.236,25.101 C17.463,26.413 19.391,26.328 19.391,26.328 C19.391,26.328 18.495,27.402 18.488,27.810 C18.488,28.475 19.084,28.885 19.135,28.935 C19.668,29.300 20.458,29.345 20.465,29.345 C15.526,34.577 9.574,29.314 9.574,29.293 C10.239,33.128 15.880,36.827 25.799,35.395 C33.843,34.117 36.417,25.305 36.417,25.305 C36.417,25.305 39.740,25.492 40.115,23.516 C39.076,23.703 37.576,23.397 37.576,23.397 C37.576,23.397 40.132,22.289 40.252,20.959 C38.752,22.118 36.519,21.794 36.468,21.794 Z" class="svg-icon" />
                    </svg>
                </a>
                <a href="https://www.linkedin.com" target="_blank" title="Linkedin social network">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="49" height="48.94" viewBox="0 0 49 48.94">>
                        <path d="M24.504,46.981 C12.078,46.981 2.004,36.907 2.004,24.480 C2.004,12.054 12.078,1.981 24.504,1.981 C36.931,1.981 47.004,12.054 47.004,24.480 C47.004,36.907 36.931,46.981 24.504,46.981 ZM14.842,13.631 C13.393,13.631 12.219,14.806 12.219,16.255 C12.219,17.704 13.393,18.879 14.842,18.879 C16.291,18.879 17.465,17.704 17.465,16.255 C17.465,14.806 16.291,13.631 14.842,13.631 ZM17.622,20.534 L12.531,20.534 L12.531,35.900 L17.622,35.900 L17.622,20.534 ZM30.703,20.159 C27.580,20.190 26.635,21.986 26.151,22.720 L26.151,20.440 L20.995,20.440 L20.995,35.837 L26.148,35.837 L26.148,27.655 C26.148,27.655 25.779,24.500 28.927,24.500 C31.261,24.500 31.301,27.019 31.277,27.362 C31.275,27.201 31.273,27.180 31.270,27.374 C31.270,27.418 31.274,27.408 31.277,27.362 C31.288,28.411 31.270,35.868 31.270,35.868 L36.329,35.884 C36.329,35.884 36.392,27.858 36.392,27.826 C36.392,26.374 36.418,20.159 30.703,20.159 Z" class="svg-icon" />
                    </svg>
                </a>
                <a href="https://plus.google.com" target="_blank" title="Google plus social network">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="49" height="48.06" viewBox="0 0 49 48.06">
                        <path d="M24.506,46.540 C12.080,46.540 2.006,36.466 2.006,24.039 C2.006,11.613 12.080,1.539 24.506,1.539 C36.932,1.539 47.006,11.613 47.006,24.039 C47.006,36.466 36.932,46.540 24.506,46.540 ZM20.755,11.061 C17.312,11.061 15.737,11.978 14.691,12.872 C13.779,13.784 12.564,15.145 12.598,17.390 C12.598,19.331 14.032,22.695 18.134,22.711 C18.404,22.695 18.567,22.706 19.208,22.655 C18.989,23.161 18.893,23.477 18.876,23.949 C18.876,24.810 19.186,25.411 19.878,26.222 C17.903,26.424 15.374,26.531 13.464,27.797 C10.370,29.687 10.696,31.954 10.696,31.920 C10.933,36.899 18.139,36.798 18.117,36.764 C23.900,36.708 26.820,33.526 26.820,30.340 C26.820,28.625 26.135,27.042 24.191,25.638 C23.338,24.861 22.090,24.406 22.095,23.275 C22.095,21.216 25.886,20.773 25.886,16.788 C25.753,13.748 23.703,12.438 23.441,12.269 C23.496,12.269 25.542,12.270 25.542,12.270 L27.714,11.061 C27.714,11.061 20.789,11.061 20.755,11.061 ZM37.789,14.068 L34.617,14.068 L34.617,10.895 L32.501,10.895 L32.501,14.068 L29.328,14.068 L29.328,16.183 L32.501,16.183 L32.501,19.356 L34.617,19.356 L34.617,16.183 L37.789,16.183 L37.789,14.068 ZM19.469,21.798 C16.583,21.639 15.637,17.360 15.637,17.360 C15.637,17.360 14.515,12.306 18.561,12.261 C21.720,11.920 22.802,16.778 22.802,16.778 C22.802,16.778 23.947,21.798 19.469,21.798 ZM24.738,31.712 C24.654,31.847 25.126,35.149 19.725,35.352 C13.920,35.251 13.796,31.572 13.796,31.234 C13.772,27.398 18.941,27.208 20.271,27.166 C21.419,27.313 24.698,29.217 24.738,31.712 Z" class="svg-icon" />
                    </svg>
                </a>
                <a href="https://www.tumblr.com" target="_blank" title="Tumblr social network">
                    <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" xmlns:xlink="http://www.w3.org/1999/xlink" width="49px" height="49px" viewBox="0 0 49 48.06">
                        <defs>
                            <filter filterUnits="userSpaceOnUse" id="drop-shadow" x="0px" y="0px" width="49px" height="49px">
                                <feOffset in="SourceAlpha" dx="0" dy="1" />
                                <feGaussianBlur result="blurOut" stdDeviation="1" />
                                <feFlood flood-color="rgb(0, 0, 0)" result="floodOut" />
                                <feComposite operator="atop" in="floodOut" in2="blurOut" />
                                <feComponentTransfer>
                                    <feFuncA type="linear" slope="0.25" />
                                </feComponentTransfer>
                                <feMerge>
                                    <feMergeNode />
                                    <feMergeNode in="SourceGraphic" />
                                </feMerge>
                            </filter>
                        </defs>
                        <path d="M23.999,46.499 C11.573,46.499 1.499,36.426 1.499,23.999 C1.499,11.573 11.573,1.499 23.999,1.499 C36.425,1.499 46.499,11.573 46.499,23.999 C46.499,36.426 36.425,46.499 23.999,46.499 ZM31.494,31.637 C27.617,33.423 25.488,32.812 25.488,29.760 C25.488,28.170 25.492,23.493 25.492,23.493 L30.500,23.493 L30.500,19.481 L25.487,19.484 L25.487,13.459 C25.487,13.459 23.197,13.458 22.088,13.458 C21.902,16.235 20.968,17.807 17.514,19.505 C17.514,20.634 17.511,23.470 17.511,23.470 L20.500,23.470 C20.500,23.470 20.500,31.154 20.500,32.489 C20.500,35.129 22.908,36.154 24.619,36.404 C26.737,36.714 29.374,36.329 31.494,35.632 C31.494,34.386 31.494,33.257 31.494,31.637 Z" class="svg-icon" />
                    </svg>
                </a>
            </div>
            <div class="contacts__text">
                <p>Hope we see you at the event!</p>
                <p>All Rights Reserved. Evato Bangladesh &#169; 2015</p>
            </div>
        </div>

        <!-- Hidden element -->
        <div id="order-form__container" class="order-form__container">
            <form enctype="multipart/form-data" id="order-form" class="order-form" method="POST" action="serv.php">
                <button id="order-form__close-btn" class="order-form__close-btn">X</button>
                <div class="form__part">
                    <span>Название фильма:</span>
                    <span id="order-form__film-name"></span>
                </div>
                <div class="form__part">
                    <span>Начало сеанса:</span>
                    <span id="order-form__start-time"></span>
                </div>
                <div class="form__part">
                    <span>Описание:</span>
                    <span id="order-form__description"></span>
                </div>
                <div class="form__part">
                    <span>Цена за билет:</span>
                    <span id="order-form__film-price"></span>
                </div>
                <div class="form__part">
                    <span>Цена за доставку билетов из Санкт-Петербурга:</span>
                    <span id="order-form__delivery-price"></span>
                </div>
                <div class="form__part">
                </div>
                <div class="form__part">
                    <span>Имя заказщика:</span>
                    <input class="req" id="order-form__customer-name" type="text" name="name" value="<?php echo isset($_COOKIE['name']) ? $_COOKIE['name'] : ''; ?>" required></input>
                </div>
                <div class="form__part">
                    <label for="input_mail">email </label>
                    <input class="req" required id="input_mail" title="your email should end with .com or .org" type="email" placeholder="something@gmail.com" name="email" value="<?php echo isset($_COOKIE['email']) ? $_COOKIE['email'] : ''; ?>">
                </div>
                <div class="form__part">
                    <span title="Формат:+7(8)9999999999">Номер телефона:</span>
                    <input required class="req" title="Формат:+7(8)9999999999" id="order-form__phone-number" type="tel" pattern="(\+7|8)[0-9]{10}" name="phone" value="<?php echo isset($_COOKIE['phone']) ? $_COOKIE['phone'] : ''; ?>"></input>
                </div>
                <div class="form__part">
                    <input type="hidden" name="MAX_FILE_SIZE" value="30000000" />
                    <label class="file-input-decorator">Загрузить купон
                        <input id="file_selector" type="file" name="file" accept="image/jpeg image/png image/gif" multiple />
                    </label>
                    <img id="form-img" class="form-img hidden-modal" src=# alt="your img">
                </div>
                <div class=form__part>
                    <span>Количество билетов:</span>
                    <span id="order-form__tikets-amount" name="tickets_amount">0</span>
                </div>
                <div class=form__part>
                    <span>Выбранные места:</span>
                    <span type="text" id="order-form__places-list" name="places" readonly></span>
                </div>
                <div class="form__part">
                    <span>Итог:</span>
                    <input type="number" id="order-form__total" name="total" readonly></input>
                </div>
                <div class="form__part">
                    <input type="hidden" name="agree" value="">
                    <label class="myCheckbox">
                        <input class="check-req" type="checkbox" required="required" name="agree">
                        <span></span>
                    </label>
                    <label class="agree-text">Я согласен на обработку персональных данных</label>
                </div>
                <button type="submit" id="order-form__order-btn" class="order-form__order-btn">Забронировать</button>
            </form>
        </div>
    </footer>

    <!-- JS connection -->

    <!-- <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script> -->

    <script type="text/babel" src="js/jquery-3.4.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


    <!-- Your custom script here -->
    <script>
        $(document).ready(function() {
            // scrolling up
            $("#up").on("click", function() {
                $("html, body").animate({
                    scrollTop: 0
                }, 500)
                return false
            })
            // menu scrolling (don't use embeded a's) (to make it more smooth)
            $(".link-menu").on("click", function() {
                const destId = $(this).attr("href")
                const scrollDest = $(destId).offset().top
                $("html, body").animate({
                    scrollTop: scrollDest
                }, 500)
                return false
            })
            // showing of the menu n the upper scroll
            const firstLine = $("#first-line")
            let prevScr = 0

            $(window).scroll(function() {
                const scr = $(window).scrollTop()

                if (scr > 100 && scr > prevScr) {
                    firstLine.addClass("out")
                } else {
                    firstLine.removeClass("out")
                }
                prevScr = scr
            })

        })
    </script>

    <!-- For ofline testing -->
    <script src="js/ajax.js"></script>
    <script src="js/slider.js"></script>
    <script src="js/films.js"></script>
    <script src="js/getting_films.js"></script>
    <script src="js/form.js"></script>

    <script src="js/owl.carousel.min.js"></script>
    <script src="js/albom.js"></script>
</body>

</html>