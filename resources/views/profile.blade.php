 <x-app-layout>

   <main class="profile-page ">
     <section class="relative block" style="height: 500px;">
       <div class="absolute top-0 w-full h-full bg-center bg-cover" style='background-image: url("/img/backprofile.jpg");'>
         <span id="blackOverlay" class="w-full h-full absolute opacity-50 bg-black"></span>
       </div>
       <div class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden" style="height: 70px;">
         <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
           <polygon class="text-gray-300 fill-current" points="2560 0 2560 100 0 100"></polygon>
         </svg>
       </div>
     </section>
     <section class="relative py-16 bg-gray-300">
       <div class="container mx-auto px-4">
         <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg -mt-80">

           <div>

             <div class="flex flex-wrap flex-col md:flex-row justify-between">

               <div class="w-full lg:w-3/12 lg:order-2 flex justify-center">
                 <div class="relative">
                   <!-- Profile Photo File Input -->
                   <input type="file" class="hidden" wire:model="photo" x-ref="photo" x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                   <!-- Current Profile Photo -->
                   <div class="mt-2" x-show="! photoPreview">
                      @if(str_contains($user->profile_photo_path, 'https') == true)
                        <img src="{{ $user->profile_photo_path }}" alt="{{ $user->name }}" class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16" style="min-width: 150px;">
                      @else
                        <img src="/storage/{{ $user->profile_photo_path }}" alt="{{ $user->name }}" class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16" style="min-width: 150px;">
                      @endif
                   </div>
                 </div>
               </div>


               <div class="w-full text-center lg:w-4/12 px-4 lg:order-3 lg:text-center lg:self-center">
                 <div class="py-6 px-3 mt-32 sm:mt-0">
                   @if (auth()->user()->id == $user->id)
                   <button class="bg-red-500 active:bg-red-600 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1" type="button" style="transition: all 0.15s ease 0s;">
                     <a href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                       Edit Profile</a>
                   </button>
                   @endif
                 </div>
               </div>


               <div class="w-full text-center lg:w-4/12 lg:order-1">
                 <div class="flex justify-center py-4 lg:pt-4 pt-8">
                   <div class="mr-4 p-3 text-center">
                     <span class="text-xl font-bold block uppercase tracking-wide text-red-500">{{ $stars_count }}</span><span class="text-sm font-semibold text-red-400">Stars</span>
                   </div>
                   <div class="mr-4 p-3 text-center">
                     <span class="text-xl font-bold block uppercase tracking-wide text-red-500">{{ $user->feedbackTo->count() }}</span><span class="text-sm font-semibold text-red-400">Feedback</span>
                   </div>
                 </div>
               </div>

             </div>

             <div class="text-center mt-8">
               <h3 class="text-4xl font-semibold leading-normal mb-1 text-gray-800">
                 {{$user->name}}
               </h3>
               <div>
                 @if($user->feedbackTo->count() != 0)
                 @for($i=1 ; $i <= round($stars_count/$user->feedbackTo->count()) ; $i++)
                   <i aria-hidden="true" class="fas fa-star text-red-500"></i>
                   @endfor

                   @for($i=round($stars_count/$user->feedbackTo->count())+1 ; $i <=5 ; $i++) <i aria-hidden="true" class="fas fa-star text-gray-300"></i>
                     @endfor
                     @else
                     @for($i=1 ; $i <=5 ; $i++) <i aria-hidden="true" class="fas fa-star text-gray-300"></i>
                       @endfor
                       @endif
               </div>

               <div class="text-sm leading-normal text-gray-500 font-bold uppercase">
                 <i class="fas fa-map-marker-alt mr-2 text-lg text-gray-500"></i>
                 {{$user->city}}, {{$user->country}}
               </div>
               <div class="mb-2 text-gray-700 mt-4">
                 <i class="fas fa-briefcase mr-2 text-lg text-gray-500"></i>{{$user->job}}
               </div>
             </div>
             <div class="mt-10 py-10 border-t border-gray-300 text-center">
               <div class="flex flex-wrap justify-center">
                 <div class="w-full lg:w-9/12 px-4">
                   <p class="mb-4 text-lg leading-relaxed text-gray-800">
                     {{$user->description}}
                   </p>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
     </section>

     <section class="relative pt-64 pb-16 bg-gray-300">
       <div class="px-4">
         <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg -mt-80">
           <div>
             <div class="py-6">

               <div class="text-black font-bold text-center text-3xl mb-6">FeedBacks</div>

               @foreach($user->feedbackTo as $client)

               <div class="flex flex-col md:flex-row justify-start items-center mx-4 border-b-2 py-2">

                 <div class="flex flex-row items-center w-full pb-4 md:pb-0 md:w-1/5 mx-2 ">
                   <div class="w-32">
                     @if(str_contains($client->partner->profile_photo_path, 'https') == true)
                     <img src="{{ $client->partner->profile_photo_path }}" class="w-16 h-16 rounded-full">
                     @else
                     <img src="/storage/{{ $client->partner->profile_photo_path }}" class="w-16 h-16 rounded-full">
                     @endif
                   </div>
                   <div class="w-full">
                     <p class="font-semibold leading-5 text-xl pb-1">{{ $client->partner->name }}</p>
                     <h4 class="text-gray-500 text-xs">{{ $client->created_at->diffForHumans()}}</h4>
                   </div>
                 </div>

                 <div class="w-4/5">
                   @for($i=1 ; $i <= $client->nb_stars ; $i++)
                     <i aria-hidden="true" class="fas fa-star text-red-500"></i>
                     @endfor

                     @for($i=$client->nb_stars+1 ; $i <=5 ; $i++) <i aria-hidden="true" class="fas fa-star text-gray-300"></i>
                       @endfor
                       <p>
                         {{ $client->comment }}
                       </p>
                 </div>

               </div>
               @endforeach

             </div>

           </div>
         </div>
       </div>
     </section>
   </main>

   <footer>
     <div class="w-max-screen-2xl min-h-screen flex items-center justify-center bg-black ">
       <div class="md:w-2/3 w-full px-4 text-white flex flex-col">
         <div class="w-full text-7xl font-bold">
           <h1 class="w-full md:w-2/3">Keep your self on update</h1>
         </div>
         <div class="flex mt-8 flex-col md:flex-row md:justify-between">
           <p class="w-full md:w-2/3 text-gray-400">To ensure that all ower articles and promotions reach you keep in touch with us. Dont forget to rate us.</p>
           <div class="w-44 pt-6 md:pt-0">
             <a class="bg-red-500 justify-center text-center rounded-lg shadow px-10 py-3 flex items-center">Contact US</a>
           </div>
         </div>
         <div class="flex flex-col">
           <div class="flex mt-24 mb-12 flex-row justify-between items-baseline">
             <div class="">
               <img src="/img/logoW.png" alt="white logo" class="w-12">
             </div>
             <a class="hidden md:block cursor-pointer text-gray-600 hover:text-white uppercase" href="#home">Home</a>
             <a class="hidden md:block cursor-pointer text-gray-600 hover:text-white uppercase" href="#articles">Articles</a>
             <a class="hidden md:block cursor-pointer text-gray-600 hover:text-white uppercase" href="#becomePartner">Become a partner</a>
             <a class="hidden md:block cursor-pointer text-gray-600 hover:text-white uppercase" href="#about">About</a>
             <a class="hidden md:block cursor-pointer text-gray-600 hover:text-white uppercase" href="#contact">Contact</a>
             <div class="flex flex-row space-x-8 items-center justify-between">
               <a>
                 <i class="fab fa-facebook"></i>
               </a>
               <a>
                 <i class="fab fa-twitter"></i>
               </a>
               <a>
                 <i class="fab fa-youtube"></i>
               </a>
             </div>
           </div>
           <hr class="border-gray-600" />
           <p class="w-full text-center my-12 text-gray-600">Copyright © 2021</p>
         </div>
       </div>
     </div>

   </footer>
   <div class="fixed right-4 bottom-4 bg-red-500 opacity-0 hover:bg-red-800 h-8 w-8 text-center rounded-full text-2xl text-white cursor-pointer transition delay-100 duration-300 ease-in-out" id="top">
     <i class="fas fa-angle-up leading-lose"></i>
   </div>


   <script>
     function toggleNavbar(collapseID) {
       document.getElementById(collapseID).classList.toggle("hidden");
       document.getElementById(collapseID).classList.toggle("block");
     }
     $("#top").click(function() {
       $([document.documentElement, document.body]).animate({
         scrollTop: $("#profile").offset().top
       }, 100);
     });
     $(window).scroll(function() {
       if ($(this).scrollTop() >= 700) {
         $('#top').css("opacity", "1");
       } else {
         $('#top').css("opacity", "0");
       }
     });
   </script>

 </x-app-layout>