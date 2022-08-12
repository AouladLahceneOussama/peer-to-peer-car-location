<x-app-layout>
    <style>
        input.star {
            display: none;
        }

        label.star {
            float: right;
            padding: 10px 4px;
            font-size: 28px;
            color: white;
            text-shadow: 0 0 5px rgba(0, 0, 0, .3);
            transition: all .2s;
        }

        input.star:checked~label.star:before {
            content: '\f005';
            color: red;
            transition: all .25s;
        }

        input.star-5:checked~label.star:before {
            color: #FE7;
            text-shadow: 0 0 5px 10px #952;
        }

        input.star-1:checked~label.star:before {
            color: #F62;
        }

        label.star:hover {
            transform: scale(1.2);
        }

        label.star:before {
            content: '\f005';
            font-style: normal;
            font-variant: normal;
            text-rendering: auto;
            -webkit-font-smoothing: antialiased;
            font-family: FontAwesome;
        }
    </style>
    <div class="min-h-screen min-w-screen flex items-center justify-center bg-gray-100 max-w-5xl lg:mx-auto my-4 mx-4">
        <div class="flex flex-col shadow-xl w-full">
            <div class="py-6 px-14 bg-gradient-to-tr from-red-600 to-red-400 rounded-tl-2xl rounded-tr-2xl text-center space-y-8">
                <h2 class="text-white text-xs uppercase">Cars rent leave a feedback</h2>
                <h4 class="text-white text-left font-bold text-xl">
                    Dear Customer,<br>
                    Thank you for getting our online rent service. We would like to know was the stat of the car. Please spare some moments to give us your valuable feedback as it will help us in improving our service.
                </h4>
            </div>
            <form action = "/feedback/add" method="post" class="py-10 px-14 md:px-0 bg-white flex justify-center">
                @csrf
                <input type="hidden" value="{{ $demandeId }}" name="demande_id">
                <input type="hidden" value="{{ $id }}" name="annonce_id">
                <div>
                    <p class="font-semibold mb-4">Please rate your service experience for the following parameters</p>
                    <div class="w-full mb-4">
                        <x-jet-label for="role" value="{{ __('Rate the car state') }}" class="font-semibold text-black text-lg" />
                        <div class="w-full flex justify-center">
                            <div class="inline-block">
                                <input class=" star star-5 " id="star-5" type="radio" name="star" value="5"/>
                                <label class="icon star star-5" for="star-5"></label>
                                <input class=" star star-4 " id="star-4" type="radio" name="star" value="4"/>
                                <label class="icon star star-4" for="star-4"></label>
                                <input class=" star star-3" id="star-3" type="radio" name="star" value="3"/>
                                <label class="icon star star-3" for="star-3"></label>
                                <input class=" star star-2" id="star-2" type="radio" name="star" value="2"/>
                                <label class="icon star star-2" for="star-2"></label>
                                <input class=" star star-1" id="star-1" type="radio" name="star" value="1"/>
                                <label class="icon star star-1" for="star-1"></label>
                            </div>
                        </div>
                    </div>
                    <div class="max-w-3xl mb-2">
                        <x-jet-label for="role" value="{{ __('Anything to say about the partner') }}" class="font-semibold text-black text-lg" />
                        <textarea rows="5" placeholder="Your review about the car" class="w-full px-2 py-2 border-2 rounded-md border-gray-200 focus:outline-none focus:ring-1 focus:ring-red-300 focus:border-transparent" name="comment" required></textarea>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="py-2 px-4 bg-red-400 text-white rounded-md text-sm focus:outline-none focus:border-transparent shadow-lg hover:bg-red-500 transition duration-300 ease-in-out">Send your feedback</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>