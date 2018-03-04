<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="shortcut icon" type="image/x-icon" href="https://www.franchiseglobal.com/images/favicon.ico"/>

        <title>Tras Mediacom | Resource Management System </title>
		@include('admin/include/head_tag')
		@stack('stylesheets')

    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">

                @include('admin/include/sidebar')

                @include('admin/include/topbar')

                @yield('main_container')

				        @yield('content')

                @include('admin/include/footer')
            </div>
        </div>

        @include('admin/include/foot_tag')
		    @stack('scripts')

    </body>
</html>
