<x-app-layout>

    <img class="w-full" id="home" src='/img/car2.jpg' />
    @livewire('rent-demandes')

    <!----------------------------- Partner Articles ---------------------------- -->
    @livewire('partner-annonce')

       <!--Datatables -->
       <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
       <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
       <script>
           $(document).ready(function() {
   
               var table = $('#example').DataTable({
                       responsive: true
                   })
                   .columns.adjust()
                   .responsive.recalc();
           });
       </script>
       
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
    <div class="fixed right-4 bottom-4 bg-red-500 opacity-0 hover:bg-red-800 h-8 w-8 text-center rounded-full text-2xl text-white cursor-pointer transition delay-100 duration-300 ease-in-out z-10" id="top">
        <i class="fas fa-angle-up leading-lose"></i>
    </div>

    <script>
        $("#top").click(function() {
            $([document.documentElement, document.body]).animate({
                scrollTop: $("#home").offset().top
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
</x-app-layout>