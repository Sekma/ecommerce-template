<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', config('app.name'))</title>

    <meta name="description" content="@yield('description', '')">

    <link rel="icon" href="{{ asset('favicon.ico') }}">

    <script src="https://unpkg.com/lucide@latest"></script>

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

   <link rel="stylesheet" href="/css/app.css">
  <!--  <link rel="stylesheet" href="{{ asset('css/app.css') }}"> -->

    @stack('styles')
</head>

<body>