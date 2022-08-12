<div wire:poll.1s x-data="{ dropdownOpen: false }" class="relative">
    <button @click="dropdownOpen = !dropdownOpen"
        class="block text-md px-4 py-2 rounded text-white ml-2 font-bold hover:text-white hover:bg-red-500 focus:outline-none focus:bg-red-500 transition duration-300 ease-in-out lg:mt-0"><i
            class="fas fa-car"></i></a>
    </button>

    <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>

    <div x-show="dropdownOpen"
        class="max-h-96 overflow-y-scroll absolute right-0 mt-2 bg-white rounded-md shadow-lg overflow-hidden z-20"
        style="width:20rem;">
        <div class="py-2">
            @forelse($demandes as $demande)
                <div class="flex items-center px-4 py-3 border-b hover:bg-gray-100 -mx-2">
                    <img class="h-8 w-8 rounded-full object-cover mx-1"
                        src="{{ $demande->annoncedispo->annonce->image1 }}" alt="avatar">
                    <div class="w-full ">
                        <p class="text-gray-600 text-sm mx-2">
                            <a class="font-bold" href="/article/{{ $demande->annoncedispo->annonce->id }}">
                                {{ $demande->annoncedispo->annonce->car_model }}</a>
                        </p>
                        <div class="flex flex-row justify-between items-center mt-1 px-4 text-gray-600 text-sm w-full">
                            <p class="text-red-500"> {{ $demande->state }}</p>
                            <p class="text-xs">{{ $demande->reservation_date }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="flex items-center px-4 py-3 border-b hover:bg-gray-100 -mx-2">
                    <p class="uppercase text-red-500 text-center"> No Demande </p>
                </div>
            @endforelse



        </div>
    </div>
</div>
