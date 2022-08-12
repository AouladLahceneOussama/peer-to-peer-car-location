<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CARS Rent</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" />
    
    <!-- Styles -->
    <link rel="stylesheet" href=".././css/owl.carousel.min.css">
    <link rel="stylesheet" href=".././css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="icon" href="/img/logoW.png">
    <link rel="stylesheet" href="css/styleTable.css">

    <!--Regular Datatables CSS-->
	 <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
	 <!--Responsive Extension Datatables CSS-->
	 <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">

		
	<!--Datatables -->
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://chir.ag/projects/ntc/ntc.js"></script>
    <!-------------owl-carousel js file-------------->
    <script src=".././js/owl.carousel.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src=".././js/caroufredsel.js" type="text/javascript"></script>
    <script src="{{ mix('js/app.js') }}" defer></script>

    @livewireStyles
    <style>
        @font-face {
            font-family: sweet;
            src: url(css/fonts/Pattaya-Regular.ttf);
        }

        .title::before {
            content: "";
            position: absolute;
            top: 50px;
            width: 250px;
            height: 3px;
            border-radius: 20px;
            background-color: #ffcccc;
        }

        .title::after {
            content: "";
            position: absolute;
            top: 50px;
            width: 120px;
            height: 3px;
            border-radius: 20px;
            background-color: red;
            transition: all 0.3s ease-in-out;
            -webkit-transition: all 0.3s ease-in-out;
        }

        .title:hover:after {
            transition: all 0.3s ease-in-out;
            -webkit-transition: all 0.3s ease-in-out;
            width: 250px;
        }

        .owl-nav .owl-prev .owl-nav-prev,
        .owl-nav .owl-next .owl-nav-next {
            color: black;
            background: transparent;
            font-size: 2rem;
            transition: .3s ease;
        }

        .owl-theme .owl-nav [class*='owl-']:hover {
            background: transparent;
            color: #ffcccc;
        }

        .owl-theme .owl-nav [class*='owl-'] {
            outline: none;
        }

        /*------------------scroll bar style---------------------*/

        /* width */
        ::-webkit-scrollbar {
            width: 3px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #000000;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #000000;
        }
        

        /*------------------scroll bar style---------------------*/

    </style>


</head>

<body class="font-sans antialiased">
    <x-jet-banner />

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-menu')

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @stack('modals')




    @livewireScripts


</body>


</html>
