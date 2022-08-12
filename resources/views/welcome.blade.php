<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CARS Rent</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" href="/img/logoW.png">

    <!-- Styles -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    @livewireStyles
    <!-------------owl-carousel js file-------------->
    <script src="js/owl.carousel.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="js/caroufredsel.js" type="text/javascript"></script>

    <script src="{{ mix('js/app.js') }}" defer></script>
    <style>
        body,
        html {
            scroll-behavior: smooth;
        }

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

        .bc {
            background-image: url('/img/money1.png');
            background-size: cover;
        }

        @media screen and (max-width: 900px) {
            .bc {
                background-image: none;
            }
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

<body>

    <div class="w-full h-screen flex flex-col items-center justify-between"
        style="background-image:linear-gradient(to right, rgba(0,0,0,.4), rgba(0,0,0,.6)), url('/img/background.jpg'); background-size:cover; background-position:center;"
        id="home">
        <div class="w-full text-white bg-transparent dark-mode:text-gray-200 dark-mode:bg-gray-800">
            <div x-data="{ open: false }"
                class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
                <div class="p-4 flex flex-row items-center justify-between">
                    <a href="#"
                        class="flex flex-row items-center space-x-4 text-lg font-semibold tracking-widest text-white uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">
                        <img src="/img/logoW.png" class="w-14" alt="">
                        <p>CARS Rent</p>
                    </a>
                    <button class="md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
                        <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                            <path x-show="!open" fill-rule="evenodd"
                                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                                clip-rule="evenodd"></path>
                            <path x-show="open" fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <nav :class="{'flex': open, 'hidden': !open}"
                    class="flex-col flex-grow pb-4 md:pb-0 hidden md:flex md:justify-end md:flex-row">
                    <a class="px-4 py-2 mt-2 text-md font-semibold bg-transparent rounded-lg md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-white hover:bg-opacity-25 focus:bg-gray-200 focus:outline-none focus:shadow-outline transition delay-100 duration-300 ease-in-out "
                        href="#home">Home</a>
                    <a class="px-4 py-2 mt-2 text-md font-semibold bg-transparent rounded-lg md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-white hover:bg-opacity-25 focus:bg-gray-200 focus:outline-none focus:shadow-outline transition delay-100 duration-300 ease-in-out "
                        href="#articles">Artciles</a>
                    <a class="px-4 py-2 mt-2 text-md font-semibold bg-transparent rounded-lg md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-white hover:bg-opacity-25 focus:bg-gray-200 focus:outline-none focus:shadow-outline transition delay-100 duration-300 ease-in-out "
                        href="#becomePartner">Become a partner</a>
                    <a class="px-4 py-2 mt-2 text-md font-semibold bg-transparent rounded-lg md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-white hover:bg-opacity-25 focus:bg-gray-200 focus:outline-none focus:shadow-outline transition delay-100 duration-300 ease-in-out "
                        href="#about">About</a>
                    <a class="px-4 py-2 mt-2 text-md font-semibold bg-transparent rounded-lg md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-white hover:bg-opacity-25 focus:bg-gray-200 focus:outline-none focus:shadow-outline transition delay-100 duration-300 ease-in-out "
                        href="#contact">Contact</a>
                    @if (Route::has('login'))

                        @auth
                            <a href="{{ url('/articles') }}"
                                class="px-4 py-2 mt-2 text-md font-semibold bg-transparent rounded-lg md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-white hover:bg-opacity-25 focus:bg-gray-200 focus:outline-none focus:shadow-outline transition delay-100 duration-300 ease-in-out">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}"
                                class="px-4 py-2 mt-2 text-md font-semibold bg-transparent rounded-lg md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-white hover:bg-opacity-25 focus:bg-gray-200 focus:outline-none focus:shadow-outline transition delay-100 duration-300 ease-in-out">Login</a>
                        @endif

                        @endif

                    </nav>
                </div>
            </div>

            <div class="container px-6 py-10 mx-auto md:py-16">
                <div class="flex flex-col space-y-6 md:flex-row md:items-center md:space-x-6">
                    <div class="w-full md:w-1/2">
                        <div class="max-w-lg">
                            <h1 class="text-3xl font-medium tracking-wide text-white md:text-4xl">
                                Cars Location
                            </h1>
                            <h1
                                class="mt-2 text-3xl font-medium tracking-wide text-white md:text-4xl border-b-2 border-color-white pb-4">
                                Find the car you need
                            </h1>

                            <div class="grid gap-6 mt-8 sm:grid-cols-2">

                                <a href="{{ route('register') }}"
                                    class="shadow-lg bg-transparent text-center hover:bg-red-500 text-white font-semibold hover:text-white py-2 px-4 border border-white-500 hover:border-transparent rounded-lg transition delay-100 duration-300 ease-in-out">
                                    Register
                                </a>
                                <a href="{{ route('login') }}"
                                    class="shadow-lg bg-transparent text-center hover:bg-red-500 text-white font-semibold hover:text-white py-2 px-4 border border-white-500 hover:border-transparent rounded-lg transition delay-100 duration-300 ease-in-out">
                                    Login
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        @livewire('premium-list')

        <div class="bc w-full bg-gray-100 py-4 bg-no-repeat bg-right" id="becomePartner">

            <div class="title relative flex justify-center">
                <h1 class="text-2xl font-medium tracking-wide text-center text-gray-800 md:text-4xl">
                    Become a partner
                </h1>
            </div>

            <div class="w-full py-20 md:py-16">
                <div class="w-full flex flex-col md:flex-row md:justify-start md:items-center md:pl-20">

                    <div class="">
                        <div class="flex flex-col space-y-6 max-w-md mx-auto">
                            <div class="w-full">
                                <p>
                                <p class="text-5xl mt-5 text-gray-600" style="font-family: sweet;">You want to make some</p>
                                <p class="text-5xl mt-5 text-gray-600" style="font-family: sweet;">extra money from</p>
                                <p class="text-5xl mt-5 text-gray-600" style="font-family: sweet;">renting your</p>
                                <p class="text-5xl mt-5 text-gray-600" style="font-family: sweet;">cars</p>
                                </p>
                            </div>
                            <div>
                                <a href="{{ route('register') }}"
                                    class="shadow-lg bg-red-500 w-full hover:bg-transparent text-white font-semibold hover:text-red-500 py-2 px-4 border border-white-500 hover:border-2 hover:border-red-500 rounded-lg transition delay-100 duration-300 ease-in-out">
                                    take place with us now
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="container flex flex-col space-y-32 min-h-screen px-6 py-10 mx-auto md:py-16" id="about">

            <div class="title relative flex justify-center">
                <h1 class="text-2xl font-medium tracking-wide text-center text-gray-800 md:text-4xl">
                    About us
                </h1>
            </div>

            <div class="flex flex-col space-y-6 md:flex-row md:items-center md:space-x-6">
                <div
                    class="flex flex-col items-center justify-center space-y-4 w-full md:w-1/2 border-b-4 border-black md:border-b-0 md:border-r-4 pb-4">
                    <img src="/img/logo.png" alt="car photo" class="w-1/3 h-1/3 max-w-2xl rounded" />
                    <h1 class="text-3xl font-medium tracking-wide text-center text-gray-800 md:text-3xl">CARS rent</h1>
                    <h2 class="text-2xl font-medium tracking-wide text-center text-gray-400 md:text-2xl">Our mossion is to
                        find what you need</h2>
                </div>
                <div class="w-full md:w-1/2">
                    <div class="max-w-md mx-auto">
                        <p class="mt-5 leading-7 text-gray-600">
                            With us you will quickly get the car you want. With our partner
                            network it is going to be fluid and easy, it is possible
                            for us to respond to your special requests. <br />
                            Our logistics partners make the rent easy for you.
                        </p>
                        <div class="grid gap-6 mt-8 sm:grid-cols-2">
                            <div class="flex items-center space-x-6 text-gray-800">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Fast responding</span>
                            </div>
                            <div class="flex items-center space-x-6 text-gray-800">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Secure process</span>
                            </div>
                            <div class="flex items-center space-x-6 text-gray-800">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Exclusive selection</span>
                            </div>
                            <div class="flex items-center space-x-6 text-gray-800">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Premium service</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @livewire('contact-us')

        <footer>
            <div class="w-full min-h-full flex items-center justify-center bg-black pt-5">
                <div class="md:w-2/3 w-full px-4 text-white flex flex-col">
                    <div class="w-full text-7xl font-bold">
                        <h1 class="w-full md:w-2/3">Keep your self on update</h1>
                    </div>
                    <div class="flex mt-8 flex-col md:flex-row md:justify-between">
                        <p class="w-full md:w-2/3 text-gray-400">To ensure that all our articles and promotions reach you
                            keep in touch with us. Dont forget to rate us.</p>
                        <div class="w-44 pt-6 md:pt-0">
                            <a class="bg-red-500 justify-center text-center rounded-lg shadow px-10 py-3 flex items-center"
                                href="#contact">Contact US</a>
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <div class="flex mt-24 mb-12 flex-row justify-between items-baseline">
                            <div class="">
                                <img src="/img/logoW.png" alt="white logo" class="w-12">
                            </div>
                            <a class="hidden md:block cursor-pointer text-gray-600 hover:text-white uppercase"
                                href="#home">Home</a>
                            <a class="hidden md:block cursor-pointer text-gray-600 hover:text-white uppercase"
                                href="#articles">Articles</a>
                            <a class="hidden md:block cursor-pointer text-gray-600 hover:text-white uppercase"
                                href="#becomePartner">Become a partner</a>
                            <a class="hidden md:block cursor-pointer text-gray-600 hover:text-white uppercase"
                                href="#about">About</a>
                            <a class="hidden md:block cursor-pointer text-gray-600 hover:text-white uppercase"
                                href="#contact">Contact</a>
                            <div class="flex flex-row space-x-8 items-center justify-between">
                                <a>
                                    <i class="fab fa-facebook"></i>
                                </a>
                                <a>
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a>
                                    <i class="fab fa-youtube"></i>
                                </a>
                            </div>
                        </div>
                        <hr class="border-gray-600" />
                        <p class="w-full text-center my-12 text-gray-600">Copyright © 2021</p>
                    </div>
                </div>
            </div>
        </footer>

        <div class="fixed right-4 bottom-4 bg-red-500 opacity-0 hover:bg-red-800 h-8 w-8 text-center rounded-full text-2xl text-white cursor-pointer transition delay-100 duration-300 ease-in-out"
            id="top">
            <i class="fas fa-angle-up leading-lose"></i>
        </div>

        @livewireScripts
        <script>
            $(document).ready(function() {
                $(".owl-carousel").owlCarousel({
                    loop: true,
                    responsiveClass: true,
                    responsive: {
                        0: {
                            items: 1,
                        },
                        600: {
                            items: 2,
                        },
                        1000: {
                            items: 3,
                        }
                    },
                    autoplay: true,
                    autoplaytimeout: 3000,
                    dots: false,
                    navText: [$(".navigationicon .owl-nav-prev"), $(".navigationicon .owl-nav-next")],
                    nav: true,
                });



                $("#top").click(function() {
                    $([document.documentElement, document.body]).animate({
                        scrollTop: $("#home").offset().top
                    }, 100);
                });
            });
            $(window).scroll(function() {
                if ($(this).scrollTop() >= 700) {
                    $('#top').css("opacity", "1");
                } else {
                    $('#top').css("opacity", "0");
                }
            });

        </script>
        @livewireScripts
    </body>

    </html>
