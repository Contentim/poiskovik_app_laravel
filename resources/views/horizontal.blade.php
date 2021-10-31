<!DOCTYPE html>
<html id="release" :class="{ 'theme-dark': dark }" x-data="data()" lang="ru">
    @include('site.head')
    <body>

        <div id="app" class="flex w-full h-screen bg-gray-50 dark:bg-gray-900">
            <horizontal></horizontal>
        </div>

        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>

