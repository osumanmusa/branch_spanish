<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title inertia>{{ config('app.name', 'Branch-Spanish') }}</title>
        <link rel="shortcut icon" href="{{ asset('img/favicon.jpg') }}">
        <link rel="icon" type="image/jpg" href="{{ asset('img/favicon.jpg') }}">
        <link rel="stylesheet"
              href="https://fonts.googleapis.com/css?family=Lato">

        <!-- Fonts -->
        
<style>
    *{
    
    font-family: "Lato";
    font-weight: 400;
    font-style: normal;
    font-display: auto;
    unicode-range: U+000-5FF;
    src: local("Lato"), url("~@/assets/fonts/Lalo/Lato-Regular.ttf") format("ttf");
    }.bg-color{
    background: #007FFF;
}
</style>

        <!-- Scripts -->
        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body class="body-font font-Lato">
        @inertia
    </body>
</html>
