<div class="mt-14 pt-5 bg-white">
    <div class="title relative flex justify-center mb-10" id="Annonces">
        <h1 class="text-2xl font-medium tracking-wide text-center text-gray-800 md:text-4xl">
            Annonces
        </h1>
        <div class="ml-4 mt-2">
            <button
                class="bg-red-500 text-white active:bg-red-600 font-bold uppercase text-xs  rounded-full h-9 w-9 flex items-center justify-center shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                type="button"><a href="{{ route('addAnnonce') }}" :active="request()->routeIs('addAnnonce')"
                    class="text-white"><i class="fas fa-plus"></i></a>
            </button>
        </div>

    </div>
    @if (session()->has('message1'))
        <div class="text-black font-bold bg-green-200 text-sm px-4 py-2">
            {{ session()->get('message1') }}
        </div>
    @endif
    <div class="flex flex-col">
        <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow ">

            <table id="example" class=" w-full whitespace-nowrap"
                style="width:100%; padding-top: 1em;  padding-bottom: 1em;">

                <thead>
                    <tr class=" h-14 text-sm leading-none text-gray-800 bg-gray-100 hover:bg-gray-100  ">
                        <th data-priority="1" class="font-normal text-left pl-4">Car Model</th>
                        <th data-priority="2" class="font-normal text-left pl-12">Title</th>
                        <th data-priority="3" class=" text-left">Price</th>
                        <th data-priority="4" class=" text-left">City</th>
                        <th data-priority="5" class=" text-left">Disponibility</th>
                        <th data-priority="6" class=" text-left">statut</th>
                        <th data-priority="7" class=" text-left">Premium</th>
                        <th data-priority="8" class=" text-left">Action</th>
                    </tr>
                </thead>

                <tbody class="text-sm text-gray-900">

                    @foreach ($article as $data)
                        <tr class="hover:bg-red-300 hover:bg-opacity-50 border-gray-300 py-4">
                            <td class="flex justify-start items-center w-32">
                                <div class="flex-shrink-0 m-2">
                                    <img class="h-14 w-14 rounded-full ring-1 ring-red-300" src="{{ $data['image1'] }}"
                                        alt="cars">
                                </div>
                                <div class="ml-2">
                                    <div class="text-sm font-medium text-gray-900 w-32 ">
                                        <p class="font-medium  car-model">{{ $data['car_model'] }}</p>
                                        <div class="flex items-center mt-1 mx-4">
                                            <button
                                                class="h-5 w-5 rounded-full border-2 border-gray-100 mr-2 focus:outline-none"
                                                style="background-color: {{ $data['color'] }};'"></button>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class=" text-left w-64"><span class="title_para w-64 px-2"> {{ $data['title'] }}</span>
                            </td>
                            <td class=" text-left">{{ $data['price'] }}</td>
                            <td class=" text-left">{{ $data['city'] }}</td>
                            <td class=" text-left">
                                @foreach ($data->annoncedispo as $dispo)
                                    <p class="font-medium">{{ $dispo->day }}</p>
                                    <p class="text-xs leading-3 text-gray-600 mt-2">{{ $dispo->from }} to
                                        {{ $dispo->to }}</p>
                                @endforeach
                            </td>

                            @if ($data->stat == 0)
                                <td class=" text-left">Not available</td>
                            @elseif($data->stat == 1)
                                <td class=" text-left">Available</td>
                            @endif

                            @if ($data->premium == 'on')
                                <td class=" text-left">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-500 font-bold text-white">
                                        Enabled
                                    </span>
                                </td>
                            @else
                                <td class=" text-left">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-500 font-bold text-white">
                                        Disabled
                                    </span>
                                </td>
                            @endif
                            <td class=" text-left">
                                <div class="flex item-center justify-center">
                                    <div class="w-4 mr-2 text-gray-500 transform hover:text-red-500 hover:scale-110">
                                        <a class="m-r-15 text-muted edit"
                                            wire:click="statut({{ $data['id'] }},{{ $data['stat'] }})">
                                            <i class="fa fa-check" style="color: green;font-size:16px;"></i>
                                        </a>
                                    </div>
                                    <div class="w-4 mr-2 text-gray-500 transform hover:text-red-500 hover:scale-110">
                                        <a wire:click="editAnnonce({{ $data['id'] }})"
                                            class="m-r-15 text-muted edit">
                                            <i class="fa fa-edit" style="color: #2196f3;font-size:16px;"></i>
                                        </a>
                                    </div>
                                    <div class="w-4 mr-2 text-red-500 transform hover:text-red-500 hover:scale-110">
                                        <a wire:click="delete({{ $data['id'] }})"> <i class="fa fa-trash"
                                                aria-hidden="true" style="color: red;font-size:16px;"></i></a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>


            </table>
        </div>
    </div>
    <style type="text/css">
        .texte {
            font-family: monospace;
            font-size: 20px;
            color: white;
            margin-left: 200px;
        }

        td span.title_para {
            display: block;
            word-wrap: break-word;
            word-break: break-all;
            white-space: normal;
        }

        .car-model {
            display: block;
            word-wrap: break-word;
            word-break: break-all;
            white-space: normal;
        }

        [x-cloak] {
            display: none;
        }

        .toggle-path {
            transition: 0.3s ease-in-out;
        }

        .toggle-circle {
            top: 0;
            transition: all 0.3s ease-in-out;
        }

        input:checked~.toggle-circle {
            left: 1.9rem;
        }

        input:checked~.toggle-path {
            background-color: #cd5c5c;
        }

        .weekDays-selector input {
            display: none !important;
        }

        .weekDays-selector input[type=checkbox]+label {
            display: inline-block;
            border-radius: 6px;
            background: #dddddd;
            height: 40px;
            width: 45px;
            line-height: 40px;
            margin-left: 30px;
            text-align: center;
            cursor: pointer;
            margin-top: 8px;
        }

        .weekDays-selector input[type=checkbox]:checked+label {
            background: #ff7f7f;
            color: #ffffff;
        }

    </style>
    <x-jet-dialog-modal wire:model="editAnnonce">

        <x-slot name="title">
            <p class="text-xl border-b-2 mb-4">
            </p>
        </x-slot>
        <x-slot name="content">
            <p class="text-red-500 text-center font-bold">Update Article</p>
            @if ($annonceToEdit != null)
                <form
                    wire:submit.prevent="edit(Object.fromEntries(new FormData($event.target)),{{ $annonceToEdit->id }})"
                    enctype="multipart/form-data">
                    <div class="grid grid-cols-1 mt-5 mx-7">
                        <label
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold font-mono">Title
                            Annonce</label>
                        <input
                            class="py-2 px-3 rounded-lg border-2 border-red-300 mt-1 focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent"
                            type="text" name="title" placeholder="Title" value="{{ $annonceToEdit->title }}" />
                    </div>
                    <div class="grid grid-cols-1 mt-5 mx-7">
                        <label
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold font-mono">Description</label>
                        <textarea
                            class="py-2 px-3 rounded-lg border-2 border-red-300 mt-1 focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent"
                            type="text" name="desc"
                            placeholder="Type your description..">{{ $annonceToEdit->description }}</textarea>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
                        <div class="grid grid-cols-1">
                            <label
                                class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold font-mono">Car
                                model</label>
                            <input
                                class="py-2 px-3 rounded-lg border-2 border-red-300 mt-1 focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent"
                                type="text" name="carModel" placeholder="Car model"
                                value="{{ $annonceToEdit->car_model }}" />
                        </div>
                        <div class="grid grid-cols-1">
                            <label
                                class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold font-mono">Price</label>
                            <input
                                class="py-2 px-3 rounded-lg border-2 border-red-300 mt-1 focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent"
                                type="number" min="0" name="price" placeholder="Price"
                                value="{{ $annonceToEdit->price }}" />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 mt-5 mx-7">
                        <label
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold font-mono">City</label>
                        <select
                            class="py-2 px-3 rounded-lg border-2 border-red-300 mt-1 focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent"
                            name="city" value="{{ $annonceToEdit->city }}">
                            <option name="city" value="Tetouan" @if ($annonceToEdit->city == 'Tetouan') selected @endif>
                                Tetouan</option>
                            <option name="city" value="Tanger" @if ($annonceToEdit->city == 'Tanger') selected @endif>
                                Tanger</option>
                            <option name="city" value="Houceima" @if ($annonceToEdit->city == 'Houceima') selected @endif>
                                Houceima</option>
                            <option name="city" value="Chefchaouen" @if ($annonceToEdit->city == 'Chefchaouen') selected @endif>Chefchaouen</option>
                            <option name="city" value="Larache" @if ($annonceToEdit->city == 'Larache') selected @endif>
                                Larache</option>
                            <option name="city" value="Ouazzane" @if ($annonceToEdit->city == 'Ouazzane') selected @endif>
                                Ouazzane</option>
                        </select>
                    </div>

                    <div class="grid grid-cols-12 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">

                       
                        <div class="flex">
                            <label for="toogleButton" class="flex items-center cursor-pointer">
                                <div class="px-2 py-4 text-gray-500 font-bold">Premium</div>
                                <!-- toggle -->
                                <div class="relative ml-12">
                                    <input id="toogleButton" onClick="hqe.checked = false;hqe1.checked = false;"
                                        type="checkbox" class="hidden" name="premium" @if ($annonceToEdit->premium == 'on') checked @endif />
                                    <!-- path -->
                                    <div class="toggle-path  bg-gray-200 w-12 h-5 rounded-full shadow-inner "></div>
                                    <!-- crcle -->
                                    <div
                                        class="toggle-circle absolute w-3.5 h-4 mt-0.5 bg-white rounded-full shadow left-1">
                                    </div>
                                </div>
                            </label>
                        </div>
                        <div class="flex">
                          <input type="radio" id="hqe" class="form-radio text-red-600 border-red-500 ml-2 mt-5"
                              value="7" name="days" @if ($annonceToEdit->premium_duration == 7) checked @endif>
                          <div class="px-2 py-4 text-gray-500 font-bold"> 7 Days</div>
                          <input type="radio" id="hqe1" class="form-radio text-red-600 border-red-500 ml-2 mt-5"
                              value="15" name="days" @if ($annonceToEdit->premium_duration == 15) checked @endif>
                          <div class="px-2 py-4 text-gray-500 font-bold"> 15 Days</div>
                      </div>

                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7">
                        <div class="weekDays-selector mt-4">
                            <ul>
                                <li>
                                    <input type="checkbox" id="weekday-mon" class="weekday" name="monday" />
                                    <label for="weekday-mon">Mon</label>
                                </li>
                            </ul>
                        </div>
                        <div class="grid grid-cols-1">
                            <label
                                class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold font-mono">From</label>
                            <input type="time" name="time1" id="to"
                                class="py-1 px-1 rounded-lg border-2 border-red-300 mt-1 focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent">
                        </div>
                        <div class="grid grid-cols-1">
                            <label
                                class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold font-mono">To</label>
                            <input type="time" name="time2" id="to"
                                class="py-1 px-1 rounded-lg border-2 border-red-300 mt-1 focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent">
                        </div>


                        <div class="weekDays-selector mt-4 ">
                            <ul>
                                <li>
                                    <input type="checkbox" id="weekday-tue" class="weekday" name="tuesday" />
                                    <label for="weekday-tue">Tue</label>
                                </li>
                            </ul>
                        </div>
                        <div class="grid grid-cols-1">
                            <label
                                class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold font-mono">From</label>
                            <input type="time" name="time3" id="to"
                                class="py-1 px-1 rounded-lg border-2 border-red-300 mt-1 focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent">
                        </div>
                        <div class="grid grid-cols-1">
                            <label
                                class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold font-mono">To</label>
                            <input type="time" name="time4" id="to"
                                class="py-1 px-1 rounded-lg border-2 border-red-300 mt-1 focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent">
                        </div>


                        <div class="weekDays-selector mt-4">
                            <ul>
                                <li>
                                    <input type="checkbox" id="weekday-wed" class="weekday" name="wednesday" />
                                    <label for="weekday-wed">Wed</label>
                                </li>
                            </ul>
                        </div>
                        <div class="grid grid-cols-1">
                            <label
                                class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold font-mono">From</label>
                            <input type="time" name="time5" id="to"
                                class="py-1 px-1 rounded-lg border-2 border-red-300 mt-1 focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent">
                        </div>
                        <div class="grid grid-cols-1">
                            <label
                                class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold font-mono">To</label>
                            <input type="time" name="time6" id="to"
                                class="py-1 px-1 rounded-lg border-2 border-red-300 mt-1 focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent">
                        </div>


                        <div class="weekDays-selector mt-4">
                            <ul>
                                <li>
                                    <input type="checkbox" id="weekday-thu" class="weekday" name="thursday" />
                                    <label for="weekday-thu">Thu</label>
                                </li>
                            </ul>
                        </div>
                        <div class="grid grid-cols-1">
                            <label
                                class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold font-mono">From</label>
                            <input type="time" name="time7" id="to"
                                class="py-1 px-1 rounded-lg border-2 border-red-300 mt-1 focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent">
                        </div>
                        <div class="grid grid-cols-1">
                            <label
                                class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold font-mono">To</label>
                            <input type="time" name="time8" id="to"
                                class="py-1 px-1 rounded-lg border-2 border-red-300 mt-1 focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent">
                        </div>


                        <div class="weekDays-selector mt-4">
                            <ul>
                                <li>
                                    <input type="checkbox" id="weekday-fri" class="weekday" name="friday" />
                                    <label for="weekday-fri">Fri</label>
                                </li>
                            </ul>
                        </div>
                        <div class="grid grid-cols-1">
                            <label
                                class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold font-mono">From</label>
                            <input type="time" name="time9" id="to"
                                class="py-1 px-1 rounded-lg border-2 border-red-300 mt-1 focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent">
                        </div>
                        <div class="grid grid-cols-1">
                            <label
                                class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold font-mono">To</label>
                            <input type="time" name="time10" id="to"
                                class="py-1 px-1 rounded-lg border-2 border-red-300 mt-1 focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent">
                        </div>


                        <div class="weekDays-selector mt-4">
                            <ul>
                                <li>
                                    <input type="checkbox" id="weekday-sat" class="weekday" name="saturday" />
                                    <label for="weekday-sat">Sat</label>
                                </li>
                            </ul>
                        </div>
                        <div class="grid grid-cols-1">
                            <label
                                class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold font-mono">From</label>
                            <input type="time" name="time11" id="to"
                                class="py-1 px-1 rounded-lg border-2 border-red-300 mt-1 focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent">
                        </div>
                        <div class="grid grid-cols-1">
                            <label
                                class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold font-mono">To</label>
                            <input type="time" name="time12" id="to"
                                class="py-1 px-1 rounded-lg border-2 border-red-300 mt-1 focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent">
                        </div>


                        <div class="weekDays-selector mt-4">
                            <ul>
                                <li>
                                    <input type="checkbox" id="weekday-sun" class="weekday" name="sunday" />
                                    <label for="weekday-sun">Sun</label>
                                </li>
                            </ul>
                        </div>
                        <div class="grid grid-cols-1">
                            <label
                                class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold font-mono">From</label>
                            <input type="time" name="time13" id="to"
                                class="py-1 px-1 rounded-lg border-2 border-red-300 mt-1 focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent">
                        </div>
                        <div class="grid grid-cols-1">
                            <label
                                class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold font-mono">To</label>
                            <input type="time" name="time14" id="to"
                                class="py-1 px-1 rounded-lg border-2 border-red-300 mt-1 focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent">
                        </div>

                    </div>
                    <div class="grid grid-cols-1 mx-7">
                        <label
                            class="uppercase mt-12 md:text-sm text-xs text-gray-500 text-light font-semibold -mb-6">Upload
                            Photo</label>

                        <div x-data="{ files: null }" id="FileUpload"
                            class="block w-full h-44 py-2 px-3 relative  appearance-none  border-gray-400 border-4 border-dashed mt-8 border-solid rounded-md hover:shadow-outline-gray hover:border-red-300">
                            <input wire:model="imagenes" type="file" multiple
                                class="absolute inset-0 z-50 m-0 p-0 w-full h-full outline-none opacity-0"
                                x-on:change="files = $event.target.files; console.log($event.target.files);"
                                x-on:dragover="$el.classList.add('active')"
                                x-on:dragleave="$el.classList.remove('active')"
                                x-on:drop="$el.classList.remove('active')" name="image[]">
                            <p class="text-gray-300">
                                {{ $annonceToEdit->image1 }}
                                {{ $annonceToEdit->image2 }}
                                {{ $annonceToEdit->image3 }}
                            </p>
                            <template x-if="files !== null">
                                <div class="flex flex-col space-y-1">
                                    <template x-for="(_,index) in Array.from({ length: files.length })">
                                        <div class="flex flex-row items-center space-x-2">

                                            <template x-if="files[index].type.includes('image/')"><i
                                                    class=" text-gray-500 far fa-file-image fa-fw"></i></template>
                                            <span class="font-medium text-gray-500"
                                                x-text="files[index].name">Uploading</span>
                                        </div>
                                    </template>
                                </div>
                            </template>

                        </div>
                    </div>


                    <div class="grid grid-cols-1 mx-7">
                        <div>
                            <style>
                                [x-cloak] {
                                    display: none;
                                }

                            </style>
                            <div x-data="app()" x-cloak>

                                <div class="mb-5">
                                    <div class="flex items-center mt-4">
                                        <div>
                                            <label for="colorSelected" class="block text-gray-500 font-bold mb-1">Select
                                                Color</label>
                                            <input id="colorSelected" type="text" placeholder="Pick a color"
                                                class="border border-transparent shadow px-4 py-2 leading-normal text-gray-700 bg-white rounded-md focus:outline-none focus:shadow-outline"
                                                readonly x-model="colorSelected" name="color">
                                        </div>
                                        <div class="relative ml-3 mt-8">
                                            <button type="button" @click="isOpen = !isOpen"
                                                class="w-10 h-10 rounded-full bg-red-700 focus:outline-none focus:shadow-outline inline-flex p-2 shadow"
                                                :style="`background: ${colorSelected}; color: white`">
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
                                                                        class="w-8 h-8 inline-flex rounded-full cursor-pointer border-4 border-white focus:outline-none focus:shadow-outline"
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

                            </div>
            @endif
            <script>
                function app() {
                    return {
                        isOpen: false,
                        colors: ['#f56565', '#231e23', '#58391c', '#eeecda', '#02475e', '#ca8a8b', '#962d2d', '#b2ab8c',
                            '#eae3c8'
                        ],
                        colorSelected: '#f56565'
                    }
                }

            </script>

</div>
</div>
<div>
    <x-jet-secondary-button wire:click="$toggle('editAnnonce')" wire:loading.attr="disabled">
        {{ 'Cancel' }}
    </x-jet-secondary-button>

    <x-jet-button type="submit" class="ml-2" wire:loading.attr="disabled">
        <!--wire:click="rentNow"-->
        {{ 'Edit' }}
    </x-jet-button>
</div>

</form>

<x-slot name="footer">

</x-slot>

</x-slot>
</x-jet-dialog-modal>
</div>
