<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/creativetimofficial/tailwind-starter-kit/compiled-tailwind.min.css" />
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.css" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>Profile</title>
</head>

<body>


    <x-app-layout>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8" id="pro">
                @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')
                <x-jet-section-border />
                @endif
                @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>

                <x-jet-section-border />
                @endif


                @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.delete-user-form')
                </div>

                @endif
            </div>
        </div>
    </x-app-layout>
    <footer>
        <div class="w-max-screen-2xl min-h-screen flex items-center justify-center bg-black ">
            <div class="md:w-2/3 w-full px-4 text-white flex flex-col">
                <div class="w-full text-7xl font-bold">
                    <h1 class="w-full md:w-2/3">Keep your self on update</h1>
                </div>
                <div class="flex mt-8 flex-col md:flex-row md:justify-between">
                    <p class="w-full md:w-2/3 text-gray-400">To ensure that all ower articles and promotions reach you keep in touch with us. Dont forget to rate us.</p>
                    <div class="w-44 pt-6 md:pt-0">
                        <a class="bg-red-500 justify-center text-center rounded-lg shadow px-10 py-3 flex items-center">Contact US</a>
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="flex mt-24 mb-12 flex-row justify-between items-baseline">
                        <div class="">
                            <img src="/img/logoW.png" alt="white logo" class="w-12">
                        </div>
                        <a class="hidden md:block cursor-pointer text-gray-600 hover:text-white uppercase" href="#home">Home</a>
                        <a class="hidden md:block cursor-pointer text-gray-600 hover:text-white uppercase" href="#articles">Articles</a>
                        <a class="hidden md:block cursor-pointer text-gray-600 hover:text-white uppercase" href="#becomePartner">Become a partner</a>
                        <a class="hidden md:block cursor-pointer text-gray-600 hover:text-white uppercase" href="#about">About</a>
                        <a class="hidden md:block cursor-pointer text-gray-600 hover:text-white uppercase" href="#contact">Contact</a>
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
    <div class="fixed right-4 bottom-4 bg-red-500 opacity-0 hover:bg-red-800 h-8 w-8 text-center rounded-full text-2xl text-white cursor-pointer transition delay-100 duration-300 ease-in-out" id="top">
        <i class="fas fa-angle-up leading-lose"></i>
    </div>
    <script>
        function toggleNavbar(collapseID) {
            document.getElementById(collapseID).classList.toggle("hidden");
            document.getElementById(collapseID).classList.toggle("block");
        }
        $("#top").click(function() {
            $([document.documentElement, document.body]).animate({
                scrollTop: $("#pro").offset().top
            }, 100);
        });
        $(window).scroll(function() {
            if ($(this).scrollTop() >= 700) {
                $('#top').css("opacity", "1");
            } else {
                $('#top').css("opacity", "0");
            }
        });
    </script>
</body>

</html>