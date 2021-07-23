<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">

        <title>Laravel</title>

    </head>
    <body class="antialiased">
    <div>
        <a href="/" class="text-sm text-gray-700 underline">Главная</a>
        <a href="{{ route('employee.index') }}" class="text-sm text-gray-700 underline">Сотрудники</a>
        <a href="{{ route('department.index') }}" class="text-sm text-gray-700 underline">Отделы</a>
    </div>
    <div class="content">
        @yield('content')
    </div>
    </body>
</html>
