@extends('layouts.auth')

@section('page_title', __('auth.forget_password.title'))

@section('content')
    <h1 class="text-xl text-color-18181a mb-3.5 font-medium">{{ __('auth.forget_password.title') }}</h1>
    <p class="text-sm">{{ __('auth.forget_password.description') }}</p>
    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <label class="block my-7">
            <span class="text-xs">{{ __('auth.forget_password.email.label') }}</span>
            <input class="mt-2" required type="email" name="email" placeholder="{{ __('auth.forget_password.email.placeholder') }}" value="{{ old('email') }}">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </label>

        <button type="submit" class="block py-3.5 px-7 w-full bg-color-18181a text-white text-xs text-center font-medium rounded">{{ __('auth.forget_password.submit') }}</button>
    
    </form>
@endsection
