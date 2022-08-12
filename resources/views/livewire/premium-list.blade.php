<div class="px-6 py-6 mx-auto min-h-screen flex flex-col space-y-20" id="articles">

    <div class="title relative flex justify-center mb-10">
        <h1 class="text-2xl font-medium tracking-wide text-center text-gray-800 md:text-4xl">
            Articles
        </h1>
    </div>
    <!-- -->

    <div class="owl-carousel owl-theme blogpost">
        @forelse ($premiums as $premium)
            <div class="p-4 md:w-full md:mb-0 mb-6 flex flex-col justify-center items-center max-w-sm mx-auto">

                <div class="bg-gray-300 h-56 w-full rounded-lg shadow-md bg-cover bg-center"
                    style="background-image: url('{{ $premium->image1 }}')"></div>


                <div class=" w-80 bg-white -mt-12 shadow-lg rounded-lg overflow-hidden p-5 h-52 flex flex-col justify-between">

                    <div>
                        <div class="text-xl flex-1 text-sm"> {{ $premium->car_model }}</div>
                        <div class="title-post font-medium">Price : {{ $premium->price }} MAD</div>
                        <div class="summary-post text-justify font-bold">{{ $premium->title }} </div>
                    </div>

                    <div class=" text-right mt-4">

                        <a href="/article/{{ $premium->id }}"
                            class="px-6  py-1 bg-red-500 text-white text-lg font-medium rounded hover:bg-red-600 focus:outline-none focus:bg-red-600">show
                            more</a>
                    </div>
                </div>

            </div>
        @empty
            <p> no premiums</p>
        @endforelse
    </div>


    <!-- -->
    <div class="navigationicon absolute">
        <span class="owl-nav-prev"><i class="fas fa-long-arrow-alt-left "></i></span>
        <span class="owl-nav-next"><i class="fas fa-long-arrow-alt-right"></i></span>
    </div>
</div>
