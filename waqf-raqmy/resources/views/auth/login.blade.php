<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form class="rtl" method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="البريد الإلكتروني" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="كلمة السر" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="mr-2 text-sm text-gray-600">تذكر الحساب</span>
                </label>
            </div>

            <div class="flex items-center mt-4">

                <x-jet-button class="ml-4">
                    تسجيل الدخول
                </x-jet-button>

                <div class="flex items-center">
                    @if (Route::has('password.request'))
                        <a class="ml-1 underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                             نسيت كلمة المرور؟
                        </a>
                    @endif

                    <p class="ml-1">أو</p>

                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                        تسجيل حساب
                    </a>
                </div>


            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
