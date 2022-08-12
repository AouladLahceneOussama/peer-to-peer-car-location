<div x-data="{ dropdownOpen: false }" class="relative" wire:poll.5s>
    <button @click="dropdownOpen = !dropdownOpen" class=" block text-md px-4  ml-2 py-2 rounded text-white font-bold hover:text-white hover:bg-red-500 focus:outline-none focus:bg-red-500 transition duration-300 ease-in-out g:mt-0"><i class="fas fa-comment-alt"></i>
    </button>

    <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>
    
    @if(count($demandes) > 0)
        <div class="absolute top-0 right-2">
            <p class="w-4 h-4 rounded-full bg-red-700 font-bold text-white text-center text-xs">!</p>
        </div>
    @endif
    
    <div x-show="dropdownOpen" class=" max-h-96 overflow-y-scroll absolute right-0 mt-2 bg-white rounded-md shadow-lg overflow-hidden z-20" style="width:20rem;">
       
        @forelse($demandes as $demande)
        <div class="py-2">
            <div class="flex items-center px-4 py-3 border-b hover:bg-gray-100 -mx-2">
                <div class="p-2 w-20"><img src="{{ $demande->annoncedispo->annonce->image1 }}" alt="{{ $demande->annoncedispo->annonce->title }}"></div>
                <div class="flex-auto text-sm text-black w-32">
                    <div class="font-bold text-xs">The rent has been complish</div>
                    <div class="text-gray-500 text-xs">{{ $demande->updated_at->diffForHumans() }} ago</div>
                    <a href="/feedback/{{ $demande->id }}/@if(auth()->user()->role == 1){{ $demande->user_id }}@else{{ $demande->annoncedispo->annonce->id }}@endif" class="truncate text-red-500 mt-2">Give us your feedback</a>
                </div>
            </div>
        </div>
        @empty
        <div class="py-2">
            <p class="uppercase text-red-500 text-center"> Nothing to feedback</p>
        </div>
        @endforelse
    
    </div>
</div>