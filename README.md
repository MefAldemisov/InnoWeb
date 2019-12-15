# Inno Cinema 

## TODO (old)
- [x] insert grid for raws
- [ ] Clear data after the form sendings
- [ ] Adopt mobile version of forms
- [ ] Add rows enumeration
- [x] сейчас обработчик бронирования документа order привязан к событию click, возникающему на самом квадрате с местом; переделайте код таким образом, чтобы обработка бронирования места иниицировалась при клике на любом месте модального окна; создайте для этих целей обработчик orderBubble
- [x] внутри обработчика логика такая, что если клик произошел не на квадрате с местом – проигнорировать. Если клик был на квадрате с местом – обработать по аналогии как сейчас в методе order

- [x] использовать двойные ковычки
- [x] функции, циклы, переменные -> \n
- [ ] 374 - на id
- [x] camel
<!-- - 236 - TODO with class -->
- [x] dont put styles on id
- [x] add coursor pointer, coursot diasble, if can take that place
- [ ] close form
- [x] list of selected place
- [ ] забронировать с разными состояниями: + ярче
- [ ] 179 - пределать на константы
- [ ] html - 335
- [ ] hoovertd place -> hovered place
- [x] вернуть на элемент
- [ ] добавить деструктуризацию
- [ ] 364

## TODO ТЗ:

- [x] При посещении лэндинга автоматически определяется регион пользователя и выводится в шапке сайта (???? Протестите кто-нибудь, я в Иннополисе живу)
- [x] На маркетинговом блоке размещены три круглых элемента-иконки с подписью (преимущества кинотеатра)
- [x] При передвижении мышью над преимуществом — иконка реагирует с использованием анимации
- [x] Одно из преимуществ имеет отношение к интерьеру кинотеатра. При наведении на него мышью всплывает подсказка - «нажми меня, чтобы увидеть интерьер»
- [x] После нажатия на преимущество всплывает галерея с фотографиями кинотеатра
### Table ?????
- [x] В блоке со списком фильмов (таблица) предусмотрены колонки: чекбокс (отметить), изображение, наименование, год выпуска, описание
- [x] Пользователь может сортировать и фильтровать таблицу по наименованию фильма и времени показа
- [x] Пользователь отмечает в таблице фильм и вызывает форму обратной связи для оформления билетов на него
- [x] Особое внимание уделить адекватному отображению таблицы с фильмами при отображении на мобильных устройствах:
    ◦ скрытие колонок «описание» и «год выпуска» на экранах менее 720px
    ◦ горизонтальная прокрутка таблицы на экранах менее 480px
### Form ???
- [x] Форма обратной связи представляет из себя всплывающий pop-up с полями: наименование фильма (подтягивается в соответствии с выбором в таблице), имя, e-mail, загрузка купона на скидку (файла); 
- [x] динамический блок с возможностью добавления строк: ряд (селект), место(селект) билета
- [x] На данной стадии реализации проекта не предусмотрена проверка ранее заказанных мест. Позволяем пользователям заказывать все места
### Back + То, что ещё не смотрела
- [ ] После заполенения и отправки формы пользователю приходит письмо с благодарностью о совершенном заказе и забронированном месте. Администратору приходит письмо-уведомление
- [x] Для административной области лэндинг пэйдж выделен отдельный URL
- [x] Поступающие от пользователей заявки сохраняются в базу данных
- [ ] Администратор сайта может просматривать / редактировать / удалять сохраненные заявки
- [x] На данной стадии реализации проекта не предусмотрен раздел авторизации для административной области лэндинг-пэйдж
- [ ] Отправка писем реализована с помощью php mail
- [x] База данных SQLlite3
- [x] Для доступа к базе данных используется расширение для PHP - PDO
- [x] Запросы к базе данных на вставку или редактирование данных должны быть экранированы с использованием prepare statements
- [ ] Сборка и подключение стилей, скриптов js к проекту осуществляется с применением webpack. Возможно использование сторонних библиотек из репозитория npm
- [ ] Информационный блок расположения кинотеатра (карта) выполнен с ипользованием сервиса Яндекс.Карты
- [ ] Для опеределения геолокации используется внешний ресурс сервиса Яндекс.Карт, работающий в соответствии с REST:
https://tech.yandex.ru/maps/jsapi/doc/2.1/ref/reference/geolocation-docpage/

### General
- [x] Дизайн лэндинг-пэйдж соответствует дизайну, предоставленному заказчиком (преподавателем) в формате *.psd Дизайн может быть измененён по взаимному соглашению с заказчиком ( консультантом курса )
- [ ] Вёрстка лэндинг-пэйдж корректно отображается в современных desktop браузерах: Google Chrome, Mozilla Firefox, Safari, Edge (последние верcии )
- [ ] Вёрстка лэндинг-пэйдж корректно отображается в современных мобильных браузерах: iOS Safari, Chrome for Android (последние версии)
- [x] Вёрстка адаптивная с применением методологии БЭМ, на flex элементах и CSS grid. Возможно использование фреймворка Bootstrap4
- [x] Вёрстка лэндинга осуществляется итеративно:
    ◦ сначала фиксированная верстка
    ◦ переделывается на резиновую
    ◦ переделывается на адаптивную с испозованием media-jQuery
- [ ] Так же используется итеративный подход с точки зрения применения разных подходов к верстке:
    ◦ 1-я итерация: шапка — float, маркетинговый блок — блочная, подвал —
    CSS grid
    ◦ 2-я итерация: float и блочная верстка переделываются на flex
- [x] Там, где это возможно, валидация полей формы обратной связи осуществляется стандартными средствами HTML5. Анимация, где возможно, должна быть реализована средствами CSS3
- [x] Интерактивное взаимодействие с пользователем (всплытие окна, другая анимация, нереализуемая средствами CSS3 ) - с использованием JavaScript и библиотеки jQuery
- [x] Для вывода списков фильмов используется внешний ресурс, работающий в соответствии с REST: https://www.themoviedb.org/documentation/api/discover ( endpoint: /discover/movie?sort_by=popularity.desc )
- [x] Серверная часть реализована с использованием языка программирования PHP 7.2, без использования фреймворков.
- [x] Обязательно использование языковых средств JavaScript из стандарта ES6.
- [x] Кодовая база JavaScript реализуется в два этапа:
    ◦ без использования возможностей ES6
    ◦ переписывается с поддержкой ES6 + подключение babel.js
- [ ] Обязательно следование рекомендациям преподавателя и консультантов по стилю оформления кода (именование функций, переменных, классов, методов) и структуре кода ( ООП, отсутсвие дублирования, логическая пофайловая разбивка проекта и именование файлов )

### My TODO
- [ ] Отладить форму под моб вёрстку
- [ ] В слайлере добавить прокрутку описания (великовата)
- [ ] Заменть все жанры на описание
- [ ] Сохранять город и подставлять его, если Untitled 