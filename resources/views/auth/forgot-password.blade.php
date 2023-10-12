@extends('layouts.auth')

@section('page_title', __('auth.forget_password.title'))

@section('content')
    <h1 class="text-xl text-color-18181a mb-3.5 font-medium">{{ __('auth.forget_password.title') }}</h1>
    <p class="text-sm">{{ __('auth.forget_password.description') }}</p>
    <form method="POST" action="{{ route('password.email') }}" class="space-y-7">
        @csrf

        <x-input type="email" name="email" label="{{ __('auth.forget_password.email.label') }}"
                 placeholder="{{ __('auth.forget_password.email.placeholder') }}"/>

        <x-primary-button type="submit" class="w-full">{{ __('auth.forget_password.submit') }}</x-primary-button>
    </form>
@endsection
