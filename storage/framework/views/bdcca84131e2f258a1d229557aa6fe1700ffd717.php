<head >
    <meta charset="UTF-8">

    <meta name="author" content="Contentim">
    
    <meta name="generator" content="Laravel + VueJS">
    <link rel="icon" type="image/png" href="https://selt.contentim.ru/themes/responsiv-clean/assets/images/contentim_favicon.png">

    <?php if(Request::path() === '/'): ?>
        <title>Конструктор ориентировок без вести пропавших</title>
    <?php elseif(Request::path() === 'horizontal'): ?>
        <title>Конструктор ориентировок без вести пропавших - Горизонтальная ориентация</title>
    <?php elseif(Request::path() === 'vertical'): ?>
        <title>Конструктор ориентировок без вести пропавших - Вертикальная ориентация</title>
    <?php elseif(Request::path() === 'about'): ?>
        <title>От автора и вопросы поддержки пользователей</title>
    <?php endif; ?>


    <link rel="canonical" href="https://contentim.ru">

    <meta property="og:locale" content="ru_RU">
    <meta property="og:type" content="website">
    <meta property="og:title" content="">
    <meta property="og:description" content="Публикации о фронтенде, бэкенде и некоторых личных увлечениях">
    <meta property="og:url" content="https://contentim.ru">
    <meta property="og:site_name" content="Contentim - записки фронтендера из Воронежа">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:description" content="Публикации о фронтенде, бэкенде и некоторых личных увлечениях">
    <meta name="twitter:title" content="https://contentim.ru">

    
    <link rel="stylesheet" href="<?php echo e(URL::asset('/css/css2.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('/css/tailwind.output.css')); ?>">
    <link href="<?php echo e(URL::asset('/css/tailwind.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(URL::asset('/css/tailwindcss-custom-form.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(URL::asset('/css/vue-select.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('/css/icon.css')); ?>">

    <style>
        @font-face {
            font-family: 'DejaVu Sans';
            src: local('DejaVu Sans ExtraLight'), local('DejaVuSans-ExtraLight'),
            url(<?php echo e(URL::asset('/fonts/djsans/dejavusansextralight.woff2')); ?>) format('woff2'),
            url(<?php echo e(URL::asset('/fonts/djsans/dejavusansextralight.woff')); ?>) format('woff'),
            url(<?php echo e(URL::asset('/fonts/djsans/dejavusansextralight.ttf')); ?>) format('truetype');
            font-weight: 200;
            font-style: normal;
        }
        @font-face {
            font-family: 'DejaVu Sans';
            src: local('DejaVu Sans'), local('DejaVuSans'),
            url(<?php echo e(URL::asset('/fonts/djsans/dejavusans.woff2')); ?>) format('woff2'),
            url(<?php echo e(URL::asset('/fonts/djsans/dejavusans.woff')); ?>) format('woff'),
            url(<?php echo e(URL::asset('/fonts/djsans/dejavusans.ttf')); ?>) format('truetype');
            font-weight: 400;
            font-style: normal;
        }
        @font-face {
            font-family: 'DejaVu Sans';
            src: local('DejaVu Sans Oblique'), local('DejaVuSans-Oblique'),
            url(<?php echo e(URL::asset('/fonts/djsans/dejavusansoblique.woff2')); ?>) format('woff2'),
            url(<?php echo e(URL::asset('/fonts/djsans/dejavusansoblique.woff')); ?>) format('woff'),
            url(<?php echo e(URL::asset('/fonts/djsans/dejavusansoblique.ttf')); ?>) format('truetype');
            font-weight: 400;
            font-style: italic;
        }
        @font-face {
            font-family: 'DejaVu Sans';
            src: local('DejaVu Sans Bold'), local('DejaVuSans-Bold'),
            url(<?php echo e(URL::asset('/fonts/djsans/dejavusansbold.woff2')); ?>) format('woff2'),
            url(<?php echo e(URL::asset('/fonts/djsans/dejavusansbold.woff')); ?>) format('woff'),
            url(<?php echo e(URL::asset('/fonts/djsans/dejavusansbold.ttf')); ?>) format('truetype');
            font-weight: 700;
            font-style: normal;
        }
        @font-face {
            font-family: 'DejaVu Sans';
            src: local('DejaVu Sans Bold Oblique'), local('DejaVuSans-BoldOblique'),
            url(<?php echo e(URL::asset('/fonts/djsans/dejavusansboldoblique.woff2')); ?>) format('woff2'),
            url(<?php echo e(URL::asset('/fonts/djsans/dejavusansboldoblique.woff')); ?>) format('woff'),
            url(<?php echo e(URL::asset('/fonts/djsans/dejavusansboldoblique.ttf')); ?>) format('truetype');
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
        .bg-orange {
            background: #ff9900 !important;
        }
        .bg-orange:hover {
            background: #cc7a00 !important;
        }
    </style>

  </head>
<?php /**PATH /home/l/lutsyi1l/mikros.contentim.ru/resources/views/site/head.blade.php ENDPATH**/ ?>