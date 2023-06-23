<!DOCTYPE html>
<html class="h-full">
<head>
    <meta charset="UTF-8" />
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0" /> -->
    <link rel="icon" type="image/svg+xml" href="/favicon.png">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <meta property="og:description" content="Создать ориентировку онлайн. Шаблон ориентировки по поиску без вести пропавшего человека с выгрузкой изображения на печать. Конструктор-генератор ориентировок по поиску без вести пропавших. Бесплатно создавайте объявления. Описание. Бесплатный конструктор ориентировок преследует лишь одну цель - облегчить труд тех, кому в силу своей волонтерской или профессиональной занятости необходимо создавать объявления о поиске без вести пропавших.">
    <meta property="og:site_name" content="poiskovik.app - конструктор ориентировок поиска пропавших без вести">

    <!-- twitter -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:description" content="Создать ориентировку онлайн. Шаблон ориентировки по поиску без вести пропавшего человека с выгрузкой изображения на печать. Конструктор-генератор ориентировок по поиску без вести пропавших. Бесплатно создавайте объявления. Описание. Бесплатный конструктор ориентировок преследует лишь одну цель - облегчить труд тех, кому в силу своей волонтерской или профессиональной занятости необходимо создавать объявления о поиске без вести пропавших.">


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

    {{-- Inertia --}}
    <script src="https://polyfill.io/v3/polyfill.min.js?features=smoothscroll,NodeList.prototype.forEach,Promise,Object.values,Object.assign" defer></script>

    {{-- Ping CRM --}}
    <script src="https://polyfill.io/v3/polyfill.min.js?features=String.prototype.startsWith" defer></script>

    <script src="{{ mix('/js/app.js') }}" defer></script>
    @inertiaHead
</head>
<body class="font-sans leading-none text-gray-700 antialiased">
    @inertia
</body>
</html>
