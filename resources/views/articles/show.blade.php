<x-app-layout>

    <main class="my-8">
        <div class="container mx-auto px-6">

            <div class="md:flex md:items-center pb-10">



                <div class="owl-carousel owl-theme blogpost w-full lg:w-1/2  items-center">
                    <div class="w-full  lg:mx-12 h-64  lg:h-96">
                        <img class="h-full w-full rounded-md object-cover max-w-lg " src="{{ $annonce->image1 }}"
                            alt="{{ $annonce->title }}">
                    </div>
                  <div class="w-full  lg:mx-12 h-64  lg:h-96">
                        <img class="h-full w-full rounded-md object-cover max-w-lg " src="{{ $annonce->image2 }}"
                            alt="{{ $annonce->title }}">
                    </div>
                  <div class="w-full  lg:mx-12 h-64  lg:h-96">
                        <img class="h-full w-full rounded-md object-cover max-w-lg " src="{{ $annonce->image3 }}"
                            alt="{{ $annonce->title }}">
                    </div>
                </div>



                @livewire('rent-btn',['article' => $annonce])

            </div>

            <hr>

            <div class="mt-4 min-h-full">
                <div class="title relative flex justify-center mb-10">
                    <h1 class="text-2xl font-medium tracking-wide text-center text-gray-800 md:text-4xl">
                        Reviews
                    </h1>
                </div>

                <div class="w-full flex flex-col flex-wrap items-center lg:flex-row lg:justify-around">
                    <!-- review item -->
                    <div class="bg-white shadow-lg rounded-lg mt-5 px-4 py-4 max-w-sm w-full lg:w-1/3">
                        <div class="mb-1 tracking-wide px-4 py-4">
                            <h2 class="text-gray-800 font-semibold mt-1">{{ $reviewsCount }} Users reviews</h2>
                            <div class="-mx-8 px-8 pb-3">
                                <div class="flex items-center mt-1">
                                    <div class=" w-1/5 text-red-500 tracking-tighter">
                                        <span>5 star</span>
                                    </div>
                                    <div class="w-3/5">
                                        <div class="bg-gray-300 w-full rounded-lg h-2">
                                            <div class="bg-red-600 rounded-lg h-2" style="width:{{ $stars5 }}%">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="w-1/5 text-gray-700 pl-3">
                                        <span class="text-sm">{{ $stars5 }}% </span>
                                    </div>
                                </div>
                                <!-- first -->
                                <div class="flex items-center mt-1">
                                    <div class="w-1/5 text-red-500 tracking-tighter">
                                        <span>4 star</span>
                                    </div>
                                    <div class="w-3/5">
                                        <div class="bg-gray-300 w-full rounded-lg h-2">
                                            <div class="bg-red-600 rounded-lg h-2" style="width:{{ $stars4 }}%">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-1/5 text-gray-700 pl-3">
                                        <span class="text-sm">{{ $stars4 }}%</span>
                                    </div>
                                </div>
                                <!-- second -->
                                <div class="flex items-center mt-1">
                                    <div class="w-1/5 text-red-500 tracking-tighter">
                                        <span>3 star</span>
                                    </div>
                                    <div class="w-3/5">
                                        <div class="bg-gray-300 w-full rounded-lg h-2">
                                            <div class="bg-red-600 rounded-lg h-2" style="width:{{ $stars3 }}%">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-1/5 text-gray-700 pl-3">
                                        <span class="text-sm">{{ $stars3 }}%</span>
                                    </div>
                                </div>
                                <!-- thierd -->
                                <div class="flex items-center mt-1">
                                    <div class=" w-1/5 text-red-500 tracking-tighter">
                                        <span>2 star</span>
                                    </div>
                                    <div class="w-3/5">
                                        <div class="bg-gray-300 w-full rounded-lg h-2">
                                            <div class="bg-red-600 rounded-lg h-2" style="width:{{ $stars2 }}%">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-1/5 text-gray-700 pl-3">
                                        <span class="text-sm">{{ $stars2 }}%</span>
                                    </div>
                                </div>
                                <!-- 4th -->
                                <div class="flex items-center mt-1">
                                    <div class="w-1/5 text-red-500 tracking-tighter">
                                        <span>1 star</span>
                                    </div>
                                    <div class="w-3/5">
                                        <div class="bg-gray-300 w-full rounded-lg h-2">
                                            <div class="bg-red-600 rounded-lg h-2" style="width:{{ $stars1 }}%">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-1/5 text-gray-700 pl-3">
                                        <span class="text-sm">{{ $stars1 }}%</span>
                                    </div>
                                </div>
                                <!-- 5th -->
                            </div>
                        </div>
                    </div>

                    <div class="owl-carousel owl-theme blogpost w-full lg:w-1/2">
                        @forelse ($comments as $comment)
                            <div class="w-full h-full flex justify-center pl-4">
                                <div class="flex flex-row my-20 relative">
                                    <div class="max-w-md px-16 bg-red-500 shadow-lg rounded-l-lg"></div>
                                    <div
                                        class="flex justify-center z-10 md:justify-end absolute transform -translate-y-1/2 top-1/2 left-20">
                                        <img class="rounded-full my-20 border-4 border-white"
                                            style="width: 5rem !important; height:5rem !important;"
                                            src="/storage/{{ $comment->user->profile_photo_path }}">
                                    </div>

                                    <div
                                        class="max-w-3xl p-10 px-14 bg-white shadow-lg rounded-r-lg flex items-center ">
                                        <div>
                                            <div>
                                                <a href="/profile/{{ $comment->user->id }}"
                                                    class="text-gray-800 text-3xl font-semibold hover:text-gray-500 transition duration-300 ease-in-out">{{ $comment->user->name }}</a>
                                                <h2 class="text-gray-500 text-sm font-semibold">
                                                    {{ $comment->created_at->diffForHumans() }}</h2>
                                                <p class="mt-2 text-gray-600">{{ $comment->comment }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="uppercase text-center text-red-500 text-xl">
                                No comments
                            </div>
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </main>

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
                            href="#articles">Dashboard</a>
                        <a class="hidden md:block cursor-pointer text-gray-600 hover:text-white uppercase"
                            href="#becomePartner">Articles</a>
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
</x-app-layout>
<script>
    $(document).ready(function() {
        $(".owl-carousel").owlCarousel({
            loop: true,
            items: 1,
            autoplay: true,
            autoplaytimeout: 3000,
            dots: true,
        });
    });

</script>
