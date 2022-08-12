<x-app-layout>

  <head>

    <style type="text/css">
      .texte {
        font-family: monospace;
        font-size: 20px;
        color: white;
        margin-left: 200px;
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
  </head>
  <div class="min-h-screen bg-cover" style="background-image:url('/img/back22.jpg');">
    <div class="flex items-center justify-center py-10">
      <div class="grid bg-black bg-opacity-50 rounded-lg shadow-xl w-11/12 md:w-9/12 lg:w-1/2">
        @if($errors->any())
        @foreach($errors->all() as $error)
        <div class="text-black font-bold bg-red-200 text-sm px-4 py-2">
          {{$error}}
        </div>
        @endforeach
        @endif
        @if(session()->has('message'))
        <div class="text-black font-bold bg-green-200 text-sm px-4 py-2">
          {{ session()->get('message') }}
        </div>
        @endif
        <div class="flex justify-center py-4">

          <div class="flex bg-black-500 rounded-full md:p-4 p-2 border-2 border-black-300">
            <img class="w-12 h-12" src="/img/logoW.png" />
          </div>
        </div>

        <div class="flex justify-center">
          <div class="flex">
            <h1 class="text-white font-bold md:text-2xl text-xl">Create Annonce</h1>
          </div>
        </div>

        <form action="/addAnnonce/add" method="post" enctype="multipart/form-data">
          @csrf
          <div class="grid grid-cols-1 mt-5 mx-7">
            <label class="uppercase md:text-sm text-xs text-white text-light font-semibold font-mono">Title Annonce</label>
            <input class="py-2 px-3 rounded-lg border-2 border-red-300 mt-1 focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent" type="text" name="title" placeholder="Title" />
          </div>
          <div class="grid grid-cols-1 mt-5 mx-7">
            <label class="uppercase md:text-sm text-xs text-white text-light font-semibold font-mono">Description</label>
            <textarea class="py-2 px-3 rounded-lg border-2 border-red-300 mt-1 focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent" type="text" name="desc" placeholder="Type your description.."></textarea>
          </div>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
            <div class="grid grid-cols-1">
              <label class="uppercase md:text-sm text-xs text-white text-light font-semibold font-mono">Car model</label>
              <input class="py-2 px-3 rounded-lg border-2 border-red-300 mt-1 focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent" type="text" name="carModel" placeholder="Car model" />
            </div>
            <div class="grid grid-cols-1">
              <label class="uppercase md:text-sm text-xs text-white text-light font-semibold font-mono">Price</label>
              <input class="py-2 px-3 rounded-lg border-2 border-red-300 mt-1 focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent" type="number" min="0" name="price" placeholder="Price" />
            </div>
          </div>

          <div class="grid grid-cols-1 mt-5 mx-7">
            <label class="uppercase md:text-sm text-xs text-white text-light font-semibold font-mono">City</label>
            <select class="py-2 px-3 rounded-lg border-2 border-red-300 mt-1 focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent" name="city">
              <option name="city" value="Tetouan">Tetouan</option>
              <option name="city" value="Tanger">Tanger</option>
              <option name="city" value="Houceima">Houceima</option>
              <option name="city" value="Chefchaouen">Chefchaouen</option>
              <option name="city" value="Larache">Larache</option>
              <option name="city" value="Ouazzane">Ouazzane</option>
            </select>
          </div>
          <div class="grid grid-cols-12 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
            <div class="flex">
              <label for="toogleButton" class="flex items-center cursor-pointer">
                <div class="px-2 py-4 text-white font-bold">Premium</div>
                <!-- toggle -->
                <div class="relative ml-12">
                  <input id="toogleButton" type="checkbox" class="hidden" name="premium" />
                  <!-- path -->
                  <div class="toggle-path  bg-gray-200 w-12 h-5 rounded-full shadow-inner "></div>
                  <!-- crcle -->
                  <div class="toggle-circle absolute w-3.5 h-4 mt-0.5 bg-white rounded-full shadow left-1"></div>
                </div>
              </label>
            </div>
            <div class="flex">
              <input type="radio" class="form-radio text-red-600 border-red-500 ml-2 mt-5" value="7" name="days">
              <div class="px-2 py-4 text-white font-bold"> 7 Days</div>
              <input type="radio" class="form-radio text-red-600 border-red-500 ml-2 mt-5" value="15" name="days">
              <div class="px-2 py-4 text-white font-bold"> 15 Days</div>
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
              <label class="uppercase md:text-sm text-xs text-white text-light font-semibold font-mono">From</label>
              <input type="time" name="time1" id="start" class="py-1 px-1 rounded-lg border-2 border-red-300 mt-1 focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent">
            </div>
            <div class="grid grid-cols-1">
              <label class="uppercase md:text-sm text-xs text-white text-light font-semibold font-mono">To</label>
              <input type="time" name="time2" id="end" class="py-1 px-1 rounded-lg border-2 border-red-300 mt-1 focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent">
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
              <label class="uppercase md:text-sm text-xs text-white text-light font-semibold font-mono">From</label>
              <input type="time" name="time3" id="to" class="py-1 px-1 rounded-lg border-2 border-red-300 mt-1 focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent">
            </div>
            <div class="grid grid-cols-1">
              <label class="uppercase md:text-sm text-xs text-white text-light font-semibold font-mono">To</label>
              <input type="time" name="time4" id="to" class="py-1 px-1 rounded-lg border-2 border-red-300 mt-1 focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent">
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
              <label class="uppercase md:text-sm text-xs text-white text-light font-semibold font-mono">From</label>
              <input type="time" name="time5" id="to" class="py-1 px-1 rounded-lg border-2 border-red-300 mt-1 focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent">
            </div>
            <div class="grid grid-cols-1">
              <label class="uppercase md:text-sm text-xs text-white text-light font-semibold font-mono">To</label>
              <input type="time" name="time6" id="to" class="py-1 px-1 rounded-lg border-2 border-red-300 mt-1 focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent">
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
              <label class="uppercase md:text-sm text-xs text-white text-light font-semibold font-mono">From</label>
              <input type="time" name="time7" id="to" class="py-1 px-1 rounded-lg border-2 border-red-300 mt-1 focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent">
            </div>
            <div class="grid grid-cols-1">
              <label class="uppercase md:text-sm text-xs text-white text-light font-semibold font-mono">To</label>
              <input type="time" name="time8" id="to" class="py-1 px-1 rounded-lg border-2 border-red-300 mt-1 focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent">
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
              <label class="uppercase md:text-sm text-xs text-white text-light font-semibold font-mono">From</label>
              <input type="time" name="time9" id="to" class="py-1 px-1 rounded-lg border-2 border-red-300 mt-1 focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent">
            </div>
            <div class="grid grid-cols-1">
              <label class="uppercase md:text-sm text-xs text-white text-light font-semibold font-mono">To</label>
              <input type="time" name="time10" id="to" class="py-1 px-1 rounded-lg border-2 border-red-300 mt-1 focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent">
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
              <label class="uppercase md:text-sm text-xs text-white text-light font-semibold font-mono">From</label>
              <input type="time" name="time11" id="to" class="py-1 px-1 rounded-lg border-2 border-red-300 mt-1 focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent">
            </div>
            <div class="grid grid-cols-1">
              <label class="uppercase md:text-sm text-xs text-white text-light font-semibold font-mono">To</label>
              <input type="time" name="time12" id="to" class="py-1 px-1 rounded-lg border-2 border-red-300 mt-1 focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent">
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
              <label class="uppercase md:text-sm text-xs text-white text-light font-semibold font-mono">From</label>
              <input type="time" name="time13" id="to" class="py-1 px-1 rounded-lg border-2 border-red-300 mt-1 focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent">
            </div>
            <div class="grid grid-cols-1">
              <label class="uppercase md:text-sm text-xs text-white text-light font-semibold font-mono">To</label>
              <input type="time" name="time14" id="to" class="py-1 px-1 rounded-lg border-2 border-red-300 mt-1 focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent">
            </div>

          </div>

          <div class="grid grid-cols-1 mx-7">
            <label class="uppercase mt-12 md:text-sm text-xs text-white text-light font-semibold -mb-6">Upload Photo</label>

            <div x-data="{ files: null }" id="FileUpload" class="block w-full h-32 py-2 px-3 relative  appearance-none  border-white border-4 border-dashed mt-8 border-solid rounded-md hover:shadow-outline-gray hover:border-red-300">
              <input type="file" multiple class="absolute inset-0 z-50 m-0 p-0 w-full h-full outline-none opacity-0" x-on:change="files = $event.target.files; console.log($event.target.files);" x-on:dragover="$el.classList.add('active')" x-on:dragleave="$el.classList.remove('active')" x-on:drop="$el.classList.remove('active')" name="image[]">
              <template x-if="files !== null">
                <div class="flex flex-col space-y-1">
                  <template x-for="(_,index) in Array.from({ length: files.length })">
                    <div class="flex flex-row items-center space-x-2">

                      <template x-if="files[index].type.includes('image/')"><i class=" text-white far fa-file-image fa-fw"></i></template>
                      <span class="font-medium text-white" x-text="files[index].name">Uploading</span>
                    </div>
                  </template>
                </div>
              </template>
              <template x-if="files === null">
                <div class="flex flex-col space-y-2 items-center justify-center">
                  <i class="fas fa-cloud-upload-alt fa-3x text-red-500"></i>
                  <p class="text-white font-bold">Drag your files here or click in this area.</p>
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
                      <label for="colorSelected" class="block text-white font-bold mb-1">Select Color</label>
                      <input id="colorSelected" type="text" placeholder="Pick a color" class="border border-transparent shadow px-4 py-2 leading-normal text-gray-700 bg-white rounded-md focus:outline-none focus:shadow-outline" readonly x-model="colorSelected" name="color">
                    </div>
                    <div class="relative ml-3 mt-8">
                      <button type="button" @click="isOpen = !isOpen" class="w-10 h-10 rounded-full bg-red-700 focus:outline-none focus:shadow-outline inline-flex p-2 shadow" :style="`background: ${colorSelected}; color: white`">
                        <svg class="w-6 h-6 fill-current text-black " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                          <path fill="none" d="M15.584 10.001L13.998 8.417 5.903 16.512 5.374 18.626 7.488 18.097z" />
                          <path d="M4.03,15.758l-1,4c-0.086,0.341,0.015,0.701,0.263,0.949C3.482,20.896,3.738,21,4,21c0.081,0,0.162-0.01,0.242-0.03l4-1 c0.176-0.044,0.337-0.135,0.465-0.263l8.292-8.292l1.294,1.292l1.414-1.414l-1.294-1.292L21,7.414 c0.378-0.378,0.586-0.88,0.586-1.414S21.378,4.964,21,4.586L19.414,3c-0.756-0.756-2.072-0.756-2.828,0l-2.589,2.589l-1.298-1.296 l-1.414,1.414l1.298,1.296l-8.29,8.29C4.165,15.421,4.074,15.582,4.03,15.758z M5.903,16.512l8.095-8.095l1.586,1.584 l-8.096,8.096l-2.114,0.529L5.903,16.512z" />
                        </svg>
                      </button>

                      <div x-show="isOpen" @click.away="isOpen = false" x-transition:enter="transition ease-out duration-100 transform" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-75 transform" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="origin-top-right absolute right-0 mt-2 w-40 rounded-md shadow-lg">
                        <div class="rounded-md bg-white shadow-xs px-4 py-3">
                          <div class="flex flex-wrap -mx-2">
                            <template x-for="(color, index) in colors" :key="index">
                              <div class="px-2">
                                <template x-if="colorSelected === color">
                                  <div class="w-8 h-8 inline-flex rounded-full cursor-pointer border-4 border-white" :style="`background: ${color}; box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.2);`"></div>
                                </template>

                                <template x-if="colorSelected != color">
                                  <div @click="colorSelected = color" @keydown.enter="colorSelected = color" role="checkbox" tabindex="0" :aria-checked="colorSelected" class="w-8 h-8 inline-flex rounded-full cursor-pointer border-4 border-white focus:outline-none focus:shadow-outline" :style="`background: ${color};`"></div>
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

              <script>
  
                function app() {
                  return {
                    isOpen: false,
                    colors: ['#f56565', '#231e23', '#58391c', '#eeecda', '#02475e', '#ca8a8b', '#962d2d', '#b2ab8c', '#eae3c8'],
                    colorSelected: '#f56565'
                  }
                }

              </script>
            </div>
          </div>

          <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
            <button class='w-auto bg-red-700 hover:bg-black rounded-lg shadow-xl font-medium text-white px-4 py-2'>Cancel</button>
            <button type="submit" class='w-auto bg-red-400 hover:bg-red-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Create</button>
          </div>
        </form>

      </div>

    </div>
  </div>
</x-app-layout>