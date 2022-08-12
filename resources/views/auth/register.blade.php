<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}" >
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" class="font-bold text-black text-lg" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" class="font-bold text-black text-lg"/>
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="flex flex-row justify-between w-full space-x-2">
                <div class="mt-4">
                    <x-jet-label for="country" value="{{ __('Country') }}" class="font-bold text-black text-lg" />
                    <x-jet-input id="country" class="block mt-1 w-full" type="text" name="country" required autocomplete="country" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="city" value="{{ __('City') }}" class="font-bold text-black text-lg"/>
                    <x-jet-input id="city" class="block mt-1 w-full" type="text" name="city" required autocomplete="city" />
                </div>
            </div>

            <div class="mt-4">
                <x-jet-label for="job" value="{{ __('Job') }}" class="font-bold text-black text-lg" />
                <x-jet-input id="job" class="block mt-1 w-full" type="text" name="job" :value="old('job')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="role" value="{{ __('Description') }}" class="font-bold text-black text-lg" />
                <textarea name="description" rows="5" class="border-red-400 rounded-md w-full shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50"></textarea>
            </div>

            <div class="mt-4">
                <x-jet-label for="role" value="{{ __('Register as') }}" class="font-bold text-black text-lg" />
                <select name="role" id="role" class="border-red-400 rounded-md w-full shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50">
                    <option value="1">Partner</option>
                    <option value="2">Client</option>
                </select>
            </div>

            <div class="flex flex-row justify-between w-full space-x-2">
                <div class="mt-4">
                    <x-jet-label for="password" value="{{ __('Password') }}" class="font-bold text-black text-lg" />
                    <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" class="font-bold text-black text-lg" />
                    <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
            <div class="mt-4">
                <x-jet-label for="terms">
                    <div class="flex items-center">
                        <x-jet-checkbox name="terms" id="terms" />

                        <div class="ml-2">
                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                            ]) !!}
                        </div>
                    </div>
                </x-jet-label>
            </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="text-sm text-white hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>