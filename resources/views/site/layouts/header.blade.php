<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta8
* @link https://tabler.io
* Copyright 2018-2022 The Tabler Authors
* Copyright 2018-2022 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
*
*
*
-->
<html lang="{{ currentLocale() }}" dir="{{ currentDirection() }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Laravelir | @yield('title') </title>
    <!-- CSS files -->
    <link href="{{ asset('/statics/shared/dist/css/tabler.rtl.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/statics/shared/dist/css/tabler-flags.rtl.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/statics/shared/dist/css/tabler-payments.rtl.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/statics/shared/dist/css/tabler-vendors.rtl.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/statics/shared/dist/css/demo.rtl.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/statics/shared/css/fonts.css') }}" rel="stylesheet" />

    @livewireStyles

</head>

<body class="border-top-wide border-danger">
