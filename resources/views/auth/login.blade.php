<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="mb-10 text-center">
        <h2 class="mb-5 text-3xl font-bold text-gray-700">Sign In</h2>
        <p class="text-gray-500">Hi! Welcome back, you've been missed</p>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="flex items-center gap-5 mb-4 text-center">
            <div class="flex-1">
                <input type="radio" name="guard" id="company" class="hidden peer" required value="company">
                <label for="company"
                    class="block px-4 py-2 text-sm transition ease-in-out bg-gray-100 rounded-md cursor-pointer hover:bg-gray-50 peer-checked:bg-blue-300">
                    <span>Company</span>
                    <img src="{{ asset('icons/company.svg') }}" alt="" class="w-[100px] mx-auto">
                </label>
            </div>

            <div class="flex-1">
                <input type="radio" name="guard" id="applicant" class="hidden peer" required value="applicant">
                <label for="applicant"
                    class="block px-4 py-2 text-sm text-center transition ease-in-out bg-gray-100 rounded-md cursor-pointer hover:bg-gray-50 peer-checked:bg-blue-300">
                    <span>Applicant</span>
                    <img src="{{ asset('icons/applicant.svg') }}" alt=""
                        class="w-[100px] mx-auto peer-checked:text-white">
                </label>
            </div>
        </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')"
                required autofocus autocomplete="username" placeholder='example@email.com' />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block w-full mt-1" type="password" name="password" required
                autocomplete="current-password" placeholder='password' />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mt-4 mb-6">
            <!-- Remember Me -->
            <div class="block">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="text-indigo-600 border-gray-300 rounded shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="text-sm text-gray-600 ms-2">{{ __('Remember me') }}</span>
                </label>
            </div>

            @if (Route::has('password.request'))
                <a class="text-sm font-semibold text-blue-700 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot Password?') }}
                </a>
            @endif
        </div>

        <div>
            <x-primary-button class="justify-center w-full mt-4">
                {{ __('Sign In') }}
            </x-primary-button>

            <div class="mt-10">
                <p class="pb-2 mb-6 text-sm text-center text-gray-600 border-b">Or sign in with</p>

                <div class="flex items-center justify-center gap-5">
                    <a href="#" class="inline-block p-3 border border-gray-200 rounded-full">
                        <img src="{{ asset('icons/google.png') }}" alt="" class="size-8">
                    </a>

                    <a href="#" class="inline-block p-3 border border-gray-200 rounded-full">
                        <img src="{{ asset('icons/facebook.png') }}" alt="" class="size-8">
                    </a>
                </div>

                <p class="mt-6 text-sm text-center text-gray-600">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="text-blue-700 underline">Sign Up</a>
                </p>
            </div>
        </div>


    </form>
</x-guest-layout>
