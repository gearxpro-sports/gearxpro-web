@extends('layouts.auth')

@section('page_title', __('auth.login.title'))

@section('content')
    <h1 class="text-xl text-color-18181a mb-3.5 font-medium">{{ __('auth.login.title') }}</h1>
    <p class="text-sm">{{ __('auth.login.description') }}</p>
    <form method="POST" action="{{ route('login') }}" class="space-y-7">
        @csrf
        <x-input type="email" name="email" label="{{ __('auth.login.email.label') }}"
                 placeholder="{{ __('auth.login.email.placeholder') }}"/>

        <div x-data="{showPassword: false}">
            <x-input x-bind:type="showPassword ? 'text' : 'password'" name="password"
                     label="{{ __('auth.login.password.label') }}"
                     placeholder="{{ __('auth.login.password.placeholder') }}">
                <x-slot:action>
                    <a class="ml-auto text-color-18181a underline hover:no-underline" tabindex="-1"
                       href="{{ route('password.request') }}">{{ __('auth.login.password.forgetLink') }}</a>
                </x-slot:action>
                <x-slot:append>
                    <div
                        @click="showPassword = !showPassword"
                        class="flex items-center justify-center absolute z-[1] inset-y-1 right-1 bg-color-eff0f0 bg-no-repeat bg-center aspect-square rounded-sm cursor-pointer">
                        <template x-if="showPassword">
                            <x-icons name="eye" class="w-4 h-4"></x-icons>
                        </template>
                        <template x-if="!showPassword">
                            <x-icons name="eye-off" class="w-4 h-4"></x-icons>
                        </template>
                    </div>
                    {{--                    <span @click="showPassword = !showPassword"--}}
                    {{--                          :class="showPassword ? 'show-password' : 'hide-password'"--}}
                    {{--                          class="absolute z-[1] inset-y-1 right-1 bg-color-eff0f0 bg-no-repeat bg-center aspect-square rounded-sm cursor-pointer"></span>--}}
                </x-slot:append>
            </x-input>
        </div>

        <x-checkbox name="remember" label="{{ __('auth.login.rememberme.label') }}" value="1"></x-checkbox>

        <x-primary-button type="submit" class="w-full">{{ __('auth.login.submit') }}</x-primary-button>
    </form>
@endsection
