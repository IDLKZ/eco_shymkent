<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Языковые ресурсы для проверки значений
    |--------------------------------------------------------------------------
    |
    | Последующие языковые строки содержат сообщения по-умолчанию, используемые
    | классом, проверяющим значения (валидатором). Некоторые из правил имеют
    | несколько версий, например, size. Вы можете поменять их на любые
    | другие, которые лучше подходят для вашего приложения.
    |
    */

    'accepted'             => 'Вы должны принять :attribute.',
    'active_url'           => 'Поле :attribute содержит недействительный URL.',
    'after'                => 'В поле :attribute должна быть дата больше :date.',
    'after_or_equal'       => 'В поле :attribute должна быть дата больше или равняться :date.',
    'alpha'                => 'Поле :attribute может содержать только буквы.',
    'alpha_dash'           => 'Поле :attribute может содержать только буквы, цифры, дефис и нижнее подчеркивание.',
    'alpha_num'            => 'Поле :attribute может содержать только буквы и цифры.',
    'array'                => 'Поле :attribute должно быть массивом.',
    'before'               => 'В поле :attribute должна быть дата раньше :date.',
    'before_or_equal'      => 'В поле :attribute должна быть дата раньше или равняться :date.',
    'between'              => [
        'numeric' => 'Поле :attribute должно быть между :min и :max.',
        'file'    => 'Размер файла в поле :attribute должен быть между :min и :max Килобайт(а).',
        'string'  => 'Количество символов в поле :attribute должно быть между :min и :max.',
        'array'   => 'Количество элементов в поле :attribute должно быть между :min и :max.',
    ],
    'boolean'              => 'Поле :attribute должно иметь значение логического типа.',
    'confirmed'            => 'Поле :attribute не совпадает с подтверждением.',
    'date'                 => 'Поле :attribute не является датой.',
    'date_equals'          => 'Поле :attribute должно быть датой равной :date.',
    'date_format'          => 'Поле :attribute не соответствует формату :format.',
    'different'            => 'Поля :attribute и :other должны различаться.',
    'digits'               => 'Длина цифрового поля :attribute должна быть :digits.',
    'digits_between'       => 'Длина цифрового поля :attribute должна быть между :min и :max.',
    'dimensions'           => 'Поле :attribute имеет недопустимые размеры изображения.',
    'distinct'             => 'Поле :attribute содержит повторяющееся значение.',
    'email'                => 'Поле :attribute должно быть действительным электронным адресом.',
    'ends_with'            => 'Поле :attribute должно заканчиваться одним из следующих значений: :values',
    'exists'               => 'Выбранное значение для :attribute некорректно.',
    'file'                 => 'Поле :attribute должно быть файлом.',
    'filled'               => 'Поле :attribute обязательно для заполнения.',
    'gt'                   => [
        'numeric' => 'Поле :attribute должно быть больше :value.',
        'file'    => 'Размер файла в поле :attribute должен быть больше :value Килобайт(а).',
        'string'  => 'Количество символов в поле :attribute должно быть больше :value.',
        'array'   => 'Количество элементов в поле :attribute должно быть больше :value.',
    ],
    'gte'                  => [
        'numeric' => 'Поле :attribute должно быть :value или больше.',
        'file'    => 'Размер файла в поле :attribute должен быть :value Килобайт(а) или больше.',
        'string'  => 'Количество символов в поле :attribute должно быть :value или больше.',
        'array'   => 'Количество элементов в поле :attribute должно быть :value или больше.',
    ],
    'image'                => 'Поле :attribute должно быть изображением.',
    'in'                   => 'Выбранное значение для :attribute ошибочно.',
    'in_array'             => 'Поле :attribute не существует в :other.',
    'integer'              => 'Поле :attribute должно быть целым числом.',
    'ip'                   => 'Поле :attribute должно быть действительным IP-адресом.',
    'ipv4'                 => 'Поле :attribute должно быть действительным IPv4-адресом.',
    'ipv6'                 => 'Поле :attribute должно быть действительным IPv6-адресом.',
    'json'                 => 'Поле :attribute должно быть JSON строкой.',
    'lt'                   => [
        'numeric' => 'Поле :attribute должно быть меньше :value.',
        'file'    => 'Размер файла в поле :attribute должен быть меньше :value Килобайт(а).',
        'string'  => 'Количество символов в поле :attribute должно быть меньше :value.',
        'array'   => 'Количество элементов в поле :attribute должно быть меньше :value.',
    ],
    'lte'                  => [
        'numeric' => 'Поле :attribute должно быть :value или меньше.',
        'file'    => 'Размер файла в поле :attribute должен быть :value Килобайт(а) или меньше.',
        'string'  => 'Количество символов в поле :attribute должно быть :value или меньше.',
        'array'   => 'Количество элементов в поле :attribute должно быть :value или меньше.',
    ],
    'max'                  => [
        'numeric' => 'Поле :attribute не может быть больше :max.',
        'file'    => 'Размер файла в поле :attribute не может быть больше :max Килобайт(а).',
        'string'  => 'Количество символов в поле :attribute не может превышать :max.',
        'array'   => 'Количество элементов в поле :attribute не может превышать :max.',
    ],
    'mimes'                => 'Поле :attribute должно быть файлом одного из следующих типов: :values.',
    'mimetypes'            => 'Поле :attribute должно быть файлом одного из следующих типов: :values.',
    'min'                  => [
        'numeric' => 'Поле :attribute должно быть не меньше :min.',
        'file'    => 'Размер файла в поле :attribute должен быть не меньше :min Килобайт(а).',
        'string'  => 'Количество символов в поле :attribute должно быть не меньше :min.',
        'array'   => 'Количество элементов в поле :attribute должно быть не меньше :min.',
    ],
    'not_in'               => 'Выбранное значение для :attribute ошибочно.',
    'not_regex'            => 'Выбранный формат для :attribute ошибочный.',
    'numeric'              => 'Поле :attribute должно быть числом.',
    'password'             => 'Неверный пароль.',
    'present'              => 'Поле :attribute должно присутствовать.',
    'regex'                => 'Поле :attribute имеет ошибочный формат.',
    'required'             => 'Поле :attribute обязательно для заполнения.',
    'required_if'          => 'Поле :attribute обязательно для заполнения, когда :other равно :value.',
    'required_unless'      => 'Поле :attribute обязательно для заполнения, когда :other не равно :values.',
    'required_with'        => 'Поле :attribute обязательно для заполнения, когда :values указано.',
    'required_with_all'    => 'Поле :attribute обязательно для заполнения, когда :values указано.',
    'required_without'     => 'Поле :attribute обязательно для заполнения, когда :values не указано.',
    'required_without_all' => 'Поле :attribute обязательно для заполнения, когда ни одно из :values не указано.',
    'same'                 => 'Значения полей :attribute и :other должны совпадать.',
    'size'                 => [
        'numeric' => 'Поле :attribute должно быть равным :size.',
        'file'    => 'Размер файла в поле :attribute должен быть равен :size Килобайт(а).',
        'string'  => 'Количество символов в поле :attribute должно быть равным :size.',
        'array'   => 'Количество элементов в поле :attribute должно быть равным :size.',
    ],
    'starts_with'          => 'Поле :attribute должно начинаться из одного из следующих значений: :values',
    'string'               => 'Поле :attribute должно быть строкой.',
    'timezone'             => 'Поле :attribute должно быть действительным часовым поясом.',
    'unique'               => 'Такое значение поля :attribute уже существует.',
    'uploaded'             => 'Загрузка поля :attribute не удалась.',
    'url'                  => 'Поле :attribute имеет ошибочный формат URL.',
    'uuid'                 => 'Поле :attribute должно быть корректным UUID.',

    /*
    |--------------------------------------------------------------------------
    | Собственные языковые ресурсы для проверки значений
    |--------------------------------------------------------------------------
    |
    | Здесь Вы можете указать собственные сообщения для атрибутов.
    | Это позволяет легко указать свое сообщение для заданного правила атрибута.
    |
    | http://laravel.com/docs/validation#custom-error-messages
    | Пример использования
    |
    |   'custom' => [
    |       'email' => [
    |           'required' => 'Нам необходимо знать Ваш электронный адрес!',
    |       ],
    |   ],
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Собственные названия атрибутов
    |--------------------------------------------------------------------------
    |
    | Последующие строки используются для подмены программных имен элементов
    | пользовательского интерфейса на удобочитаемые. Например, вместо имени
    | поля "email" в сообщениях будет выводиться "электронный адрес".
    |
    | Пример использования
    |
    |   'attributes' => [
    |       'email' => 'электронный адрес',
    |   ],
    |
    */

    'attributes' => [
        'name'                  => 'Имя',
        'username'              => 'Никнейм',
        'email'                 => 'E-Mail адрес',
        'first_name'            => 'Имя',
        'last_name'             => 'Фамилия',
        'password'              => 'Пароль',
        'password_confirmation' => 'Подтверждение пароля',
        'city'                  => 'Город',
        'country'               => 'Страна',
        'address'               => 'Адрес',
        'phone'                 => 'Телефон',
        'mobile'                => 'Моб. номер',
        'age'                   => 'Возраст',
        'sex'                   => 'Пол',
        'gender'                => 'Пол',
        'day'                   => 'День',
        'month'                 => 'Месяц',
        'year'                  => 'Год',
        'hour'                  => 'Час',
        'minute'                => 'Минута',
        'second'                => 'Секунда',
        'title'                 => 'Наименование',
        'content'               => 'Контент',
        'description'           => 'Описание',
        'excerpt'               => 'Выдержка',
        'date'                  => 'Дата',
        'time'                  => 'Время',
        'available'             => 'Доступно',
        'size'                  => 'Размер',
        //
        "role_id"=>"Роль",
        "img"=>"Изображение",
        "status"=>"Статус",
        "banned"=>"В черном списке",
        "verified"=>"Верифицирован",
        "non-verified"=>"Не верифицирован",
        "non-banned"=>"Не в черном списке",
        "thumbnail"=>"Предпросмотр",
        "subtitle"=>"Подзаголовок",
        "links"=>"Ссылки",
        "author_id"=>"Автор",
        "language_id"=>"Язык",
        "word"=>"Слово",
        "authors"=>"Соавторы",
        "file"=>"Файл",
        "news_id"=>"Новость",
        "alias"=>"Ссылка",
        "position"=>"Позиция",
        "video_url"=>"Видео",
        "currency"=>"Валюта",
        "question"=>"Вопрос",
        "answer"=>"Ответ",
        "course_id"=>"Курс",
        "link"=>"Ссылка",
        "author"=>"Автор",
        "title_ru"=>"Наименование на русском",
        "title_kz"=>"Наименование на казахском",
        "subtitle_ru"=>"Подтекст на русском",
        "subtitle_kz"=>"Подтекст на казахском",
        "desc_ru"=>"Описание на русском",
        "desc_kz"=>"Описание на казахском",
        "category_id"=>"Категория",
        //General
        "info"=>"Настройки",
        "change"=>"Изменить",
        "edit"=>"Редактировать",
        "delete"=>"Удалить",
        "save"=>"Сохранить",
        "download"=>"Скачать",
        "back"=>"Назад",
        "cancel"=>"Отменить",
        "create"=>"Создать",
        "sure"=>"Вы уверены?",
        "action"=>"Действия",
        "logout"=>"Выход",

        //Auth - Login,Register
        "welcome_login"=>"Добро пожаловать! Вход в личный кабинет",
        "email"=>"Email",
        "emails"=>"Почта",
        "password"=>"Пароль",
        "same_password"=>"Повторите пароль",
        "remember_me"=>"Запомнить меня",
        "not_signed"=>"Нет учетной записи? Зарегистрируйтесь прямо сейчас",
        "signed"=>"Есть учетная запись? Выполнить вход",
        "login"=>"Вход",
        "forgot"=>"Забыли пароль?",
        "register_message"=>"Создайте учетную запись на нашем портале",
        "name"=>"ФИО или Наименование",
        "phone"=>"Телефон",
        "phones"=>"Номера телефонов",
        "register"=>"Зарегистрироваться",
        "i_forgot"=>"Восстановить",
        "recovery_password"=>"Восстановить пароль",

        "id"=>"Порядковый номер",
        "role_id"=>"Роль",
        "main"=>"Главная",
        "users"=>"Пользователи",
        "users_list"=>"Список пользователей",
        "status"=>"Статус",
        "verified"=>"Подтвержден",
        "yes_status"=>"Активен",
        "not_verified"=>"Не потвержден",
        "not_status"=>"Не активен",
        "mod_status"=>"На модерации",


//    Menu
        'sliders' => 'Слайдер',
        'places' => 'Путеводитель',
        'places_category' => 'Категория путеводителя',
        'places_name' => 'Места',
//    End Menu

//    Table
        'title_kz' => 'Наименование на каз',
        'title_ru' => 'Наименование на рус',
        'title_en' => 'Наименование на анг',
        'video_kz' => 'Видеоссылка на каз',
        'video_ru' => 'Видеоссылка на рус',
        'video_en' => 'Видеоссылка на анг',
        'audio_kz' => 'Аудиоссылка на каз',
        'audio_ru' => 'Аудиоссылка на рус',
        'audio_en' => 'Аудиоссылка на анг',
        'description_kz' => 'Описание на каз',
        'description_ru' => 'Описание на рус',
        'description_en' => 'Описание на анг',
        'button_kz' => 'Кнопка на каз',
        'button_ru' => 'Кнопка на рус',
        'button_en' => 'Кнопка на анг',
        'link' => 'Ссылка',
        'number' => 'Порядковый номер',
        'image' => 'Изображение',
        "description"=>"Описание",
        "title"=>"Заголовок",
//    End Table


//Events
        "alias"=>"Ссылка",
        "event_categories"=>"Категория Событий",
        "events"=>"События",
        "place_id"=>"Объект из путеводителя",
        "event_types"=>"Услуга или мероприятие",
        "address"=>"Адрес",
        "address_link"=>"Обозначения на карте",
        "eventum"=>"Код в eventum",
        "social_networks"=>"Соц сети",
        "sites"=>"Вэб сайты",
        "images"=>"Несколько изображений",
        "rating_company"=>"Рейтинг",
        "rating_ball"=>"Рейтинг балл",
        "price"=>"Стоимость",
        "event_type"=>"Тип события",
        "not_required"=>"*Необязательное поле",

//    Routes
        "route_categories"=>"Категория Маршрутов",
        "route_types"=>"Типы маршрутов",
        "routes_points"=>"Маршруты и точки",
        "routes"=>"Маршрут",
        "points"=>"Точки маршрута",
        "distance"=>"Дистанция",
        "time"=>"Время",
        "shops"=>"Магазины и Ремесленники",
        "user_id"=>"Привязанный пользователь",

        //Souvenirs
        "souvenir_category"=>"Категория сувениров",
        "souvenirs"=>"Сувениры",
        "souvenir"=>"Сувенир",
        "category_id"=>"Категория",
        "shop_id"=>"Магазин/Ремесленник",
        "organizators"=>"Гиды и турагенства",
        "languages"=>"Языки",
        "education_kz"=>"Образование на казахском",
        "education_ru"=>"Образование на русском",
        "education_en"=>"Образование на английском",
        "category_news"=>"Категория новостей",
        "news"=>"Новости",
        "tags_blogs"=>"Блог и тэги",
        "tags"=>"Тэги",
        "blogs"=>"Блог",

        "galleries"=>"Галерея",
        "workdays"=>"Рабочие дни",
        "weekday_id"=>"День недели",
        "date_start"=>"Дата начала",
        "date_end"=>"Дата конца",
        "time_start"=>"Время начала",
        "time_end"=>"Время конца",
        "reviews"=>"Отзывы",
        "review"=>"Отзыв",
        "rating"=>"Рейтинг",
        "pagination"=>"Кол-во отоброжаемых элементов",
        'order'=>"Загрузка по дате",
        'ASC'=>"Сначала старые",
        "DESC"=>"Сначала новые",
        "all"=>"Все",
        "settings"=>"Фильтры",
        "partners"=>"Партнеры",
        "partner"=>"Партнер",
        "contacts"=>"Контакты",
        "icon"=>"Соц сеть",
        "socials"=>"Соц сети",
        "social"=>"Соц сети",
        "backup"=>"Резервные копии БД",
        "search"=>"Поиск",
        "start_search"=>"Начать поиск",
        "parent_id"=>"Родительская категория",



//    Stats
        "all_users"=>"Все пользователи",
        "admin"=>"Администраторы",
        "moderator"=>"Модераторы",
        "usual_user"=>"Пользователь",
        "tour_agency"=>"Тур.агенство",
        "guide"=>"Гиды",
        "craft"=>"Магазины",
        "craftman"=>"Ремесленники",
        "active"=>"Активные",
        "non_active"=>"Не активные",
        "on_moderation"=>"На модерации",
        "geocode"=>"Карта",
        "area_id"=>"Район"




    ],
];
