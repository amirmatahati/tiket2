<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

     <title>{{ MetaTag::get('title') }}</title>
	{!! MetaTag::tag('keywords') !!}
	{!! MetaTag::tag('description') !!}
	{!! MetaTag::tag('image') !!}
        
        {!! MetaTag::openGraph() !!}
        
        {!! MetaTag::twitterCard() !!}

        {{--Set default share picture after custom section pictures--}}
        {!! MetaTag::tag('image', asset('images/gue_jogja.jpg')) !!}
	<link rel="shortcut icon" href="{{ asset('image/amh.ico')}}" type="image/x-icon">
    <!-- Styles -->
	@include('includes/headTags')
		@stack('stylesheets')
    <!--<link href="{{ asset('css/app.css') }}" rel="stylesheet">-->
</head>
<body>
    <div id="app">
		@include('includes/TopBar')
		

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
	@include('includes/footTags')
		    @stack('scripts')
<!--    <script src="{{ asset('js/app.js') }}"></script>-->
</body>
</html>
