<div>
    
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="h-full w-full flex justify-center items-center p-2 ">
                <form wire:submit.prevent ="search(Object.fromEntries(new FormData($event.target)))" class="border border-gray-100 p-6 grid grid-cols-1 gap-6 bg-white bg-opacity-60 shadow-lg rounded-lg my-4 w-full">

                    <span
                        class="tracking-wider md:w-1/5 w-full text-white bg-red-500 px-4 py-1 text-sm rounded leading-loose mx-2 font-semibold "
                        title="">
                        <i class="fas fa-filter" aria-hidden="true"></i> Choose your filter
                    </span>

                    <div class="grid gap-8 mt-6 sm:grid-cols-2 md:grid-cols-3">
                        <div>
                            <h1>City</h1>
                            <select name="city"
                            
                                class="w-full border-red-300 rounded-md shadow-sm focus:border-red-300 focus:ring focus:ring-red-300 focus:ring-opacity-50">
                                <option value="" selected>Select</option>
                                @foreach ($cityOptions as $city)
                                    <option value="{{ $city->city }}">{{ $city->city }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <h1>Car model</h1>
                            <select name="car_model"
                                class="w-full border-red-300 rounded-md shadow-sm focus:border-red-300 focus:ring focus:ring-red-300 focus:ring-opacity-50">
                                <option value="" selected>Select</option>
                                @foreach ($carModelOptions as $carModel)
                                    <option value="{{ $carModel->car_model }}">{{ $carModel->car_model }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <h1>Colors</h1>


                            <div x-data="app()" x-cloak>
                                <div class="flex items-center w-full">
                                    <div class=" w-full">
                                        <input id="colorSelected" type="text" placeholder="Pick a color"
                                            name="color"
                                            class="w-full border-red-300 rounded-md shadow-sm focus:border-red-300 focus:ring focus:ring-red-300 focus:ring-opacity-50"
                                            readonly x-model="colorSelected">
                                    </div>
                                    <div class="relative ml-2 ">
                                        <button type="button" @click= "isOpen = !isOpen" class="w-10 h-10 rounded-full  focus:outline-none focus:shadow-outline inline-flex p-2 shadow-md" :style="`background: ${colorSelected}; color: white`">
                                            <svg class="w-6 h-6 fill-current text-black "
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path fill="none"
                                                    d="M15.584 10.001L13.998 8.417 5.903 16.512 5.374 18.626 7.488 18.097z" />
                                                <path
                                                    d="M4.03,15.758l-1,4c-0.086,0.341,0.015,0.701,0.263,0.949C3.482,20.896,3.738,21,4,21c0.081,0,0.162-0.01,0.242-0.03l4-1 c0.176-0.044,0.337-0.135,0.465-0.263l8.292-8.292l1.294,1.292l1.414-1.414l-1.294-1.292L21,7.414 c0.378-0.378,0.586-0.88,0.586-1.414S21.378,4.964,21,4.586L19.414,3c-0.756-0.756-2.072-0.756-2.828,0l-2.589,2.589l-1.298-1.296 l-1.414,1.414l1.298,1.296l-8.29,8.29C4.165,15.421,4.074,15.582,4.03,15.758z M5.903,16.512l8.095-8.095l1.586,1.584 l-8.096,8.096l-2.114,0.529L5.903,16.512z" />
                                            </svg>
                                        </button>

                                        <div x-show="isOpen" @click.away="isOpen = false"
                                            x-transition:enter="transition ease-out duration-100 transform"
                                            x-transition:enter-start="opacity-0 scale-95"
                                            x-transition:enter-end="opacity-100 scale-100"
                                            x-transition:leave="transition ease-in duration-75 transform"
                                            x-transition:leave-start="opacity-100 scale-100"
                                            x-transition:leave-end="opacity-0 scale-95"
                                            class="origin-top-right absolute right-0 mt-2 w-40 rounded-md shadow-lg">
                                            <div class="rounded-md bg-white shadow-xs px-4 py-3">
                                                <div class="flex flex-wrap -mx-2">
                                                    <template x-for="(color, index) in colors" :key="index">
                                                        <div class="px-2">
                                                            <template x-if="colorSelected === color">
                                                                <div class="w-8 h-8 inline-flex rounded-full cursor-pointer border-4 border-white"
                                                                    :style="`background: ${color}; box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.2);`">
                                                                </div>
                                                            </template>

                                                            <template x-if="colorSelected != color">
                                                                <div @click="colorSelected = color"
                                                                    @keydown.enter="colorSelected = color"
                                                                    role="checkbox" tabindex="0"
                                                                    :aria-checked="colorSelected"
                                                                    class="w-8 h-8 inline-flex rounded-full cursor-pointer border-2 border-gray-300 focus:outline-none focus:shadow-outline"
                                                                    :style="`background: ${color};`"></div>
                                                            </template>
                                                        </div>
                                                    </template>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <script>
                                function app() {

                                    return {
                                        isOpen: false,
                                        colors: ['#000000', '#646570','#b7b4bb','#FFFFFF','#1D068D','#f94552','#498C45','#8D3405','#FBDE40'],
                                        colorSelected: ''
                                    }
                                }

                            </script>
                        </div>


                        <div class="flex flex-col">
                            <label for="">Price</label>

                            <input type="number" name="price" min="0" max="1000"
                                class="w-full border-red-300 rounded-md shadow-sm focus:border-red-300 focus:ring focus:ring-red-300 focus:ring-opacity-50">

                        </div>

                        <div>
                            <h1>Day</h1>

                            <input type="date" name="date" id="date"
                                min="<?php echo date('Y-m-d', strtotime('today')); ?>"
                                max="<?php echo date('Y-m-d', strtotime(date('Y-m-d', strtotime('today')) . ' +7 days')); ?>"
                                class="w-full border-red-300 rounded-md shadow-sm focus:border-red-300 focus:ring focus:ring-red-300 focus:ring-opacity-50">
                        </div>
                        
                            <div class=" w-full flex space-x-6">
                                <div class="w-1/2">
                                    <label for="From">From</label>
                                    <input type="time" name="from" class="w-full border-red-300 rounded-md shadow-sm focus:border-red-300 focus:ring focus:ring-red-300 focus:ring-opacity-50">
                                </div>
                                <div  class="w-1/2">
                                    <label for="to"> To </label>
                                    <input type="time" name="to" class="w-full border-red-300 rounded-md shadow-sm focus:border-red-300 focus:ring focus:ring-red-300 focus:ring-opacity-50">
                                </div>
                            </div>

                    </div>
                    <div class="flex justify-end">
                        <button type="reset"  wire:click ="resetForm" class="shadow-lg  mr-1 bg-red-400 w-1/8 hover:bg-white text-white font-semibold hover:text-red-500 py-2 px-4 border border-white-500 hover:border-2 hover:border-red-500 rounded-lg transition delay-100 duration-300 ease-in-out">Reset</button>
                        <button type="submit" class="shadow-lg bg-red-500 w-1/4 hover:bg-white text-white font-semibold hover:text-red-500 py-2 px-4 border border-white-500 hover:border-2 hover:border-red-500 rounded-lg transition delay-100 duration-300 ease-in-out">Search</button>
                    </div>
                </form>
            </div>


            <div class="w-full flex flex-col flex-wrap md:flex-row md:justify-between md:items-center ">
                <!------------------------------articleeeeee----------------------------->
                @foreach ($annonces as $annonce)
                    <div class="mx-auto px-4 py-8 w-full md:w-1/3 mb-5 ">
                        <div class="bg-white shadow-2xl rounded-lg mb-6 tracking-wide" style="height:450px">
                            <div class="md:flex-shrink-0">
                                <img src="{{ $annonce->image1 }}" alt="{{ $annonce->title }}"
                                    class="w-full h-64 rounded-lg rounded-b-none">
                            </div>
                            <div class="px-4 py-2 mt-2 relative flex flex-col justify-between" style="height:200px">
                                <div class="">
                                    <h2 class="font-bold text-2xl text-gray-800 tracking-normal">
                                        {{ substr($annonce->title, 0, 50) }}</h2>
                                    <p class="text-sm text-gray-700 px-2 mr-1">
                                        {{ substr($annonce->description, 0, 100) }} ...
                                    </p>
                                </div>
                                <div class="w-full mx-2 my-4">
                                    <div class="flex items-center justify-between mx-6">
                                        <a href="{{ 'article/' . $annonce->id }}"
                                            :active="request()->routeIs('article')"
                                            class="text-red-800 text-xs -ml-3 ">Read More</a>
                                        <a href="{{ 'article/' . $annonce->id }}" class="flex text-gray-700">
                                            <i class="fas fa-comments text-red-400 mr-1"></i>
                                            {{ $annonce->feedbackArticle->count() }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mx-4">
                {{ $annonces->links() }}
            </div>

        </div>
    </div>
</div>
