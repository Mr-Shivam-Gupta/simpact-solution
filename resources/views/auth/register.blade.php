

<x-guest-layout>
    <style>
        .google-btn {
            display: flex;
            justify-content: center;
            margin-top: 10px;
            /* display: inline-block; */
            background-color: #4285F4;
            color: #ffffff;
            border-radius: 5px;
            border: 1px solid #4285F4;
            white-space: nowrap;
            transition: background 0.3s ease;
            text-decoration: none;
            padding: 10px 15px;
        }
        
        .google-btn:hover {
          background-color: #357AE8;
        }
        
        .google-icon-wrapper {
          width: 23px;
          height: 23px;
          align-items: center;
          margin-right: 10px;
          display: inline-block;
        }
        
        .google-icon {
          width: 100%;
          border-radius: 2px;
        }
        
        .btn-text {
          display: inline-block;
          font-size: 14px;
          font-weight: bold;
          vertical-align: middle;
        }
           </style>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
        <div class="container">
            <a href="{{url('/google-login') }}" class="google-btn">
              <div class="google-icon-wrapper">
                <img class="google-icon" src="{{asset('assets/images/google-icon.png')}}" alt="Google Logo">
              </div>
              <p class="btn-text"><b>Sign in with Google</b></p>
            </a>
          </div>
    </form>
</x-guest-layout>