@extends('layouts.auth')

@section('page_title', __('auth.login.title'))

@section('content')
    <h1 class="text-xl text-color-18181a mb-3.5 font-medium">{{ __('auth.login.title') }}</h1>
    <p class="text-sm">{{ __('auth.login.description') }}</p>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <label class="block my-7">
            <span class="text-xs">{{ __('auth.login.email.label') }}</span>
            <input class="mt-2" required type="email" name="email" placeholder="{{ __('auth.login.email.placeholder') }}">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </label>

        <label class="block my-7">
            <span class="flex text-xs">
                {{ __('auth.login.password.label') }}
                <a class="ml-auto text-color-18181a underline hover:no-underline" href="{{ route('password.request') }}">{{ __('auth.login.password.forgetLink') }}</a>
            </span>
            <span class="relative block" x-data="{showPassword: false}">
                <input :type="showPassword ? 'text' : 'password'" class="mt-2" required type="password" name="password" placeholder="{{ __('auth.login.password.placeholder') }}">
                <span @click="showPassword = !showPassword" :class="showPassword ? 'show-password' : 'hide-password'" class="absolute z-[1] inset-y-1 right-1 bg-color-eff0f0 bg-no-repeat bg-center aspect-square rounded-sm cursor-pointer"></span>
            </span>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </label>

        <label class="flex items-center my-7">
            <input type="checkbox" name="remember" value="1"><span class="ml-2 text-xs">{{ __('auth.login.rememberme.label') }}</span>
        </label>

        <button type="submit" class="block py-3.5 px-7 w-full bg-color-18181a text-white text-xs text-center font-medium rounded">{{ __('auth.login.submit') }}</button>
    
    </form>
@endsection
