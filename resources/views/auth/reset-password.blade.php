<x-guest-layout>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
            

    <x-auth-card>
        <x-slot name="logo">
            <h3 class="text-white">Reset Your Password!</h3>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors"/>

        <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')"/>

                <x-input id="email" class="block mt-1 w-full border border-white" type="email" name="email"
                         :value="old('email', $request->email)" required autofocus readonly/>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('New Password')"/>

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" placeholder="Format:[A-Z],[a-z],[0-9],[#?!@$%^&*-]" required/>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')"/>

                <x-input id="password_confirmation" class="block mt-1 w-full"
                         type="password"
                         name="password_confirmation" required/>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Confirm') }}
                </x-button><br>

            </div>

        </form>
    </x-auth-card>
</x-guest-layout>
