<div x-data="{ dropdownOpen: false }" class="relative">
    <button @click="dropdownOpen = !dropdownOpen"
        class=" block text-md px-4  ml-2 py-2 rounded text-white font-bold hover:text-white hover:bg-red-500 focus:outline-none focus:bg-red-500 transition duration-300 ease-in-out g:mt-0"><i
            class="fas fa-shopping-cart"></i>
    </button>

    <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>
    <div class="absolute top-0 right-2">
        <p class="w-4 h-4 rounded-full bg-red-700 font-bold text-white text-center text-xs">{{ $itemCartCount }}</p>
    </div>

    <div x-show="dropdownOpen" class="max-h-96 overflow-y-scroll absolute right-0 mt-2 bg-white rounded-md shadow-lg overflow-hidden z-20"
        style="width:20rem;">

        @forelse($carts as $cart)

            <div class="py-2">
                <div class="flex items-center px-4 py-3 border-b hover:bg-gray-100 -mx-2">
                   
                        <a  href="/article/{{ $cart->annonce->id }}" class="p-2 w-20"><img src="{{ $cart->annonce->image1 }}" alt="{{ $cart->title }}">
                        </a>
                        <a class="flex-auto text-sm text-black w-32">
                            <div class="font-bold text-xs">{{ $cart->annonce->title }}</div>
                            <div class="truncate">{{ $cart->annonce->price }} dh</div>
                        </a>
                    
                    <button wire:click="removeFromCart({{ $cart->id }})"
                        class="text-red-400 mr-4 focus:outline-none hover:text-red-500 transition duration-300 ease-in-out">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
        @empty
            <div class="py-2">
                <p class="uppercase text-red-500 text-center"> No article added</p>
            </div>
        @endforelse
    </div>
</div>
