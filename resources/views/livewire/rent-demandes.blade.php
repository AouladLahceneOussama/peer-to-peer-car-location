<div class="px-6 min-h-screen" id="Demandes" wire:poll.1s>
    <div class="title relative flex justify-center my-10">
        <h1 class="text-2xl font-medium tracking-wide text-center text-gray-800 md:text-4xl">
            Demandes
        </h1>
    </div>

    <div class="flex flex-col items-center md:flex-row justify-around mt-24">

        @forelse($demandes as $demande)

            <div class="w-4/5 md:w-1/4 rounded-lg overflow-hidden shadow-xl mb-10 flex flex-col justify-between" style="height:26rem">
                <div class="relative ">
                    <img class="w-full h-52" src="{{ $demande->annoncedispo->annonce->image1 }}" alt="Mountain" />
                    <div class="absolute top-0 flex items-center bg-gray-100 bg-opacity-50 rounded-xm w-full py-1 px-2">

                        <div class="w-12 h-12">
                            <img class="w-12 h-12 object-cover rounded-full mr-4 "
                                src='/storage/{{ $demande->user->profile_photo_path }}' alt="avatar">
                        </div>
                        <h2 class=" text-sm tracking-tighter text-gray-900 ml-10">
                            <a href="/profile/{{ $demande->user->id }}">{{ $demande->user->name }}</a>
                            <p class="text-gray-600">{{ $demande->created_at->diffForHumans() }}</p>
                        </h2>

                    </div>


                    <div class="px-6 py-2">
                        <div class="font-bold text-xl mb-2 ">{{ $demande->annoncedispo->annonce->car_model }}
                        </div>
                        <p class="text-gray-700 text-base">
                            {{ $demande->annoncedispo->annonce->title }}<br>
                            {{ $demande->reservation_day }} {{ $demande->reservation_date }} <br>

                        </p>
                    </div>
                </div>

                <div class="px-6 pb-2">
                    <div class="flex flex-row justify-end space-x-2">
                        <button
                            class="bg-red-500 text-white rounded py-1 px-4 text-sm hover:bg-red-400 transition duration-300 ease-in-out"
                            wire:click='acceptDemande({{ $demande->id }})'>Accept</button>
                        <button
                            class="bg-black text-white rounded py-1 px-4 text-sm hover:bg-gray-600 transition duration-300 ease-in-out"
                            wire:click='refuseDemande({{ $demande->id }})'>Refuse</button>
                    </div>
                </div>

            </div>

        @empty
            <div class="uppercase text-red-500 text-center text-xl">
                no demandes
            </div>
        @endforelse

    </div>
    <div class="mx-10">
        {{ $demandes->links() }}
    </div>

</div>
