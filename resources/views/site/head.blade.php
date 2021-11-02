<head >
    <meta charset="UTF-8">

    <meta name="author" content="Contentim">
    <meta name="generator" content="Laravel + VueJS">
    <link href='{{ url('sitemap.xml') }}' rel='alternate' title='Sitemap' type='application/rss+xml'/>

    <link rel="icon" type="image/png" href="https://selt.contentim.ru/themes/responsiv-clean/assets/images/contentim_favicon.png">

    @if (Request::path() === '/')
        <title>Конструктор ориентировок поиска пропавших без вести</title>
        <meta property="og:title" content="Конструктор ориентировок поиска пропавших без вести">
        <meta name="twitter:title" content="Конструктор ориентировок поиска пропавших без вести">

        <meta property="og:url" content="https://poiskovik.app/">
        <link rel="canonical" href="https://poiskovik.app/">
    @elseif (Request::path() === 'horizontal')
        <title>Конструктор ориентировок поиска пропавших без вести - Горизонтальная ориентация</title>
        <meta property="og:title" content="Конструктор ориентировок поиска пропавших без вести - Горизонтальная ориентация">
        <meta name="twitter:title" content="Конструктор ориентировок поиска пропавших без вести - Горизонтальная ориентация">

        <meta property="og:url" content="https://poiskovik.app/horizontal">
        <link rel="canonical" href="https://poiskovik.app/horizontal">
    @elseif (Request::path() === 'vertical')
        <title>Конструктор ориентировок поиска пропавших без вести - Вертикальная ориентация</title>
        <meta property="og:title" content="Конструктор ориентировок поиска пропавших без вести - Вертикальная ориентация">
        <meta name="twitter:title" content="Конструктор ориентировок поиска пропавших без вести - Вертикальная ориентация">

        <meta property="og:url" content="https://poiskovik.app/vertical">
        <link rel="canonical" href="https://poiskovik.app/vertical">
    @elseif (Request::path() === 'about')
        <title>От автора конструктора и вопросы поддержки пользователей</title>
        <meta property="og:title" content="От автора конструктора и вопросы поддержки пользователей">
        <meta name="twitter:title" content="От автора конструктора и вопросы поддержки пользователей">

        <meta property="og:url" content="https://poiskovik.app/about">
        <link rel="canonical" href="https://poiskovik.app/about">
    @endif


    <meta name="yandex-verification" content="1c96194a3deb430a" />

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(73503937, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true,
            webvisor:true
        });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/73503937" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->

    <!-- Open Graph -->
    <meta property="og:locale" content="ru_RU">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ URL::asset('/seo/horizontal_23561141_2021.png')}}"/>
    <meta name="twitter:image" content="{{ URL::asset('/seo/horizontal_23561141_2021.png')}}">

    <meta property="og:description" content="Создать ориентировку онлайн. Шаблон ориентировки по поиску без вести пропавшего человека с выгрузкой изображения на печать. Конструктор-генератор ориентировок по поиску без вести пропавших. Бесплатно создавайте объявления. Описание. Бесплатный конструктор ориентировок преследует лишь одну цель - облегчить труд тех, кому в силу своей волонтерской или профессиональной занятости необходимо создавать объявления о поиске без вести пропавших.">
    <meta property="og:site_name" content="poiskovik.app - конструктор ориентировок поиска пропавших без вести">

    <!-- twitter -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:description" content="Создать ориентировку онлайн. Шаблон ориентировки по поиску без вести пропавшего человека с выгрузкой изображения на печать. Конструктор-генератор ориентировок по поиску без вести пропавших. Бесплатно создавайте объявления. Описание. Бесплатный конструктор ориентировок преследует лишь одну цель - облегчить труд тех, кому в силу своей волонтерской или профессиональной занятости необходимо создавать объявления о поиске без вести пропавших.">


    {{--<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet">--}}
    <link rel="stylesheet" href="{{ URL::asset('/css/css2.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('/css/tailwind.output.css')}}">
    <link href="{{ URL::asset('/css/tailwind.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('/css/tailwindcss-custom-form.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('/css/vue-select.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('/css/icon.css')}}">

    <style>
        @font-face {
            font-family: 'DejaVu Sans';
            src: local('DejaVu Sans ExtraLight'), local('DejaVuSans-ExtraLight'),
            url({{ URL::asset('/fonts/djsans/dejavusansextralight.woff2')}}) format('woff2'),
            url({{ URL::asset('/fonts/djsans/dejavusansextralight.woff')}}) format('woff'),
            url({{ URL::asset('/fonts/djsans/dejavusansextralight.ttf')}}) format('truetype');
            font-weight: 200;
            font-style: normal;
        }
        @font-face {
            font-family: 'DejaVu Sans';
            src: local('DejaVu Sans'), local('DejaVuSans'),
            url({{ URL::asset('/fonts/djsans/dejavusans.woff2')}}) format('woff2'),
            url({{ URL::asset('/fonts/djsans/dejavusans.woff')}}) format('woff'),
            url({{ URL::asset('/fonts/djsans/dejavusans.ttf')}}) format('truetype');
            font-weight: 400;
            font-style: normal;
        }
        @font-face {
            font-family: 'DejaVu Sans';
            src: local('DejaVu Sans Oblique'), local('DejaVuSans-Oblique'),
            url({{ URL::asset('/fonts/djsans/dejavusansoblique.woff2')}}) format('woff2'),
            url({{ URL::asset('/fonts/djsans/dejavusansoblique.woff')}}) format('woff'),
            url({{ URL::asset('/fonts/djsans/dejavusansoblique.ttf')}}) format('truetype');
            font-weight: 400;
            font-style: italic;
        }
        @font-face {
            font-family: 'DejaVu Sans';
            src: local('DejaVu Sans Bold'), local('DejaVuSans-Bold'),
            url({{ URL::asset('/fonts/djsans/dejavusansbold.woff2')}}) format('woff2'),
            url({{ URL::asset('/fonts/djsans/dejavusansbold.woff')}}) format('woff'),
            url({{ URL::asset('/fonts/djsans/dejavusansbold.ttf')}}) format('truetype');
            font-weight: 700;
            font-style: normal;
        }
        @font-face {
            font-family: 'DejaVu Sans';
            src: local('DejaVu Sans Bold Oblique'), local('DejaVuSans-BoldOblique'),
            url({{ URL::asset('/fonts/djsans/dejavusansboldoblique.woff2')}}) format('woff2'),
            url({{ URL::asset('/fonts/djsans/dejavusansboldoblique.woff')}}) format('woff'),
            url({{ URL::asset('/fonts/djsans/dejavusansboldoblique.ttf')}}) format('truetype');
            font-weight: 700;
            font-style: italic;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/header@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/simple-image@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/list@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/checklist@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/quote@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/warning@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/marker@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/embed@latest"></script>

    <script src="https://cdn.jsdelivr.net/npm/@editorjs/inline-code@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/delimiter@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/code@latest"></script>

    <style>
        .text-orange {
            color: #F34606 !important;
        }
        .bg-orange {
            background: #F34606 !important;
        }
        .bg-orange:hover {
            background: #cc7a00 !important;
        }
        #success {
            width: 300px;
            right: 30px;
            height: 100px;
            top: 10px;
            background: #41c59b !important;
            /*border-color: #e2e8f0 !important;*/
        }
        #close_success {
            top: 2px;
            right: 7px;
        }
    </style>

    <script>
        window._asset = '{{ asset('') }}';
    </script>

</head>
