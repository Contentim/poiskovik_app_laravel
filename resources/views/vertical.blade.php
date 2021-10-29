<!DOCTYPE html>
<html id="release" :class="{ 'theme-dark': dark }" x-data="data()" lang="ru">
@include('site.head')
<body>

<div  id="app"
      class="flex h-screen bg-gray-50 dark:bg-gray-900"
>
    <sidebar-desktop></sidebar-desktop>
    <sidebar-mobile></sidebar-mobile>

    <div class="flex flex-col flex-1 w-full">
        <site-header></site-header>

        <vertical></vertical>
    </div>

</div>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
