<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100"  style="background-image:linear-gradient(to right, rgba(0,0,0,.7), rgba(0,0,0,.7)), url('/img/background.jpg'); background-size:cover; background-position:center;">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white bg-opacity-30 shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
