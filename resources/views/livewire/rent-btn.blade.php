<div class="w-full max-w-lg mx-auto mt-5 md:ml-8 md:mt-0 md:w-1/2">

    <div class="w-full my-2">
        @if (session()->has('message'))
            <div class="text-green-300 bg-green-600 text-sm px-4 py-2 rounded">
                {{ session('message') }}
            </div>
        @endif
    </div>

    <h3 class="text-gray-700 uppercase text-2xl mb-2">{{ $article->title }}</h3>
    <h4 class="text-gray-700 uppercase text-xl mb-2">{{ $article->car_model }}</h4>
    <h3 class="text-gray-500 text-md">{{ $article->description }}</h3>

    <hr class="mb-5 border-gray-200">
    <div class="mt-2">
        <label class="text-gray-700 text-xl" for="price">Price</label>
        <div class="flex items-center mt-1 mx-4">
            <span class="text-gray-600 text-md">{{ $article->price }} MAD/H</span>
        </div>
    </div>
    <div class="mt-2">
        <label class="text-gray-700 text-xl" for="disponibility">Disponibility</label>
        @foreach ($annoncedispo as $dispo)
            @if ($dispo->stat != 0)
                <div class="flex flex-row justify-between items-center mt-1 w-full border-b-2 mx-4">
                    <span class="text-gray-600 text-md w-1/5">{{ $dispo->day }} </span>
                    <span class="text-gray-600 text-md ">From {{ $dispo->from }} </span>
                    <span class="text-gray-600 text-md ">to {{ $dispo->to }}</span>
                </div>
            @else
                <div class="flex flex-row justify-between items-center mt-1 w-full border-b-2 mx-4 line-through">
                    <span class="text-gray-600 text-md w-1/5">{{ $dispo->day }} </span>
                    <span class="text-gray-600 text-md ">From {{ $dispo->from }} </span>
                    <span class="text-gray-600 text-md ">to {{ $dispo->to }}</span>
                </div>
            @endif
        @endforeach
    </div>
    <div class="mt-3">
        <label class="text-gray-700 text-xl" for="count">Color</label>
        <div class="flex items-center mt-1 mx-4">
            <button class="h-5 w-5 rounded-full border-2 border-blue-200 mr-2 focus:outline-none"
                style="background-color: {{ $annonce->color }}"></button>
        </div>
    </div>
    <div class="flex flex-wrap items-center mt-6">

        @if (auth()->user()->role == 2)
            @if ($countDateDispo != 0)
                <button wire:click="confirmingRent()"
                    class="px-8 py-2 bg-red-500 text-white text-lg font-medium rounded hover:bg-red-600 focus:outline-none focus:bg-red-600">Rent
                    Now</button>
            @else
                <button
                    class="px-8 py-2 bg-red-300 text-white text-lg font-medium rounded focus:outline-none cursor-not-allowed">Not
                    disponible</button>
            @endif

            @if ($addedCart == 0)
                <button wire:click="addToCart()"
                    class="mx-2 text-gray-600 border rounded-md p-2 hover:bg-gray-200 focus:outline-none text-lg">
                    <i class="fas fa-cart-plus"></i>
                </button>
            @else
                <abbr title="Already added to your cart">
                    <button
                        class="mx-2 text-gray-300 border rounded-md p-2 focus:outline-none text-lg cursor-not-allowed">
                        <i class="fas fa-cart-plus"></i>
                    </button>
                </abbr>
            @endif
        @endif
    </div>
    <!-- Delete User Confirmation Modal -->
    <x-jet-dialog-modal wire:model="confirmingRent">

        <x-slot name="title">
            <p class="text-xl border-b-2 mb-4">
                {{ $annonce->title }}
            </p>
            {{ __('Rent this car') }}
        </x-slot>

        <x-slot name="content">
            <span class="text-gray-500 text-md">
                {{ __('Choose the day when you want to rent the car from the intervals bellow.') }}
            </span>
            <div class="mt-4" x-data="{}"
                x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                <div class="flex flex-col">
                    @foreach ($annonce->annoncedispo as $dispo)
                        @if ($dispo->stat != 0)
                            <label class="inline-flex items-center mt-3">
                                <input type="radio" class="form-radio h-5 w-5 text-red-600" name="day"
                                    value="{{ $dispo->day }}" wire:model="dispoDate"><span
                                    class="ml-2 text-gray-700">{{ $dispo->day }}</span>
                            </label>
                        @endif
                    @endforeach
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmingRent')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="rentNow" wire:loading.attr="disabled">
                {{ __('Rent now') }}
            </x-jet-button>
        </x-slot>

    </x-jet-dialog-modal>
</div>
