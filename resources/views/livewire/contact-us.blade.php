<div class="w-full h-screen bg-gray-100" id="contact">
    <div class="max-w-3xl px-6 py-10 mx-auto flex flex-col space-y-18">
        <div class="title relative flex justify-center mb-10">
            <h1 class="text-2xl font-medium tracking-wide text-center text-gray-800 md:text-4xl">
                Contact with us
            </h1>
        </div>
        <div>
            <div>
                @if (session()->has('message'))
                    <div class="bg-green-300 py-2 text-center font-semibold text-lg">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
            <form wire:submit.prevent="contactUs(Object.fromEntries(new FormData($event.target)))">
                <div class="flex flex-col mt-6 space-y-5 sm:flex-row sm:items-center sm:space-y-0 sm:space-x-5">
                    <input type="text" placeholder="Name" name="name" 
                        class="w-full border-gray-300 rounded-md shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50" />
                    <input type="email" placeholder="E-Mail" name="email"
                        class="w-full border-gray-300 rounded-md shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50" />
                </div>
                <textarea name="message" id="message" placeholder="Message"
                    class="w-full h-56 mt-5 border-gray-300 rounded-md shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50"
                    spellcheck="false"></textarea>
                <div class="flex items-center justify-end mt-6">
                    <button type="submit"
                        class="px-5 py-3 font-medium tracking-wide text-center text-white capitalize bg-red-600 rounded hover:bg-red-500 focus:outline-none focus:bg-red-500 transition delay-100 duration-300 ease-in-out">
                        Send
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
