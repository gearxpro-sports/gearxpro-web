@extends('layouts.auth')

@section('page_title', __('auth.reset_password.title'))

@section('content')
    <h1 class="text-xl text-color-18181a mb-3.5 font-medium">{{ __('auth.reset_password.title') }}</h1>
    <p class="text-sm">{{ __('auth.forget_password.description') }}</p>
    <form 
        method="POST"
        action="{{ route('password.store') }}"
        x-data="{
            email: '{{ old('email', $request->email) }}',
            password: '',
            passwordConfirmation: '',
            error: false,
            submitDisabled: true
        }"
        x-effect="() => {
            error = passwordConfirmation.trim().length !== 0 && password !== passwordConfirmation;
            submitDisabled = !(email.trim().length !== 0 && password.trim().length !== 0 && passwordConfirmation.trim().length !== 0 && !error);
        }"
    >
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <label class="block my-7">
            <span class="text-xs">{{ __('auth.reset_password.email.label') }}</span>
            <input x-model.lazy="email" class="mt-2" required type="email" name="email" placeholder="{{ __('auth.reset_password.email.placeholder') }}">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </label>

        <label class="block my-7">
            <span class="text-xs">{{ __('auth.reset_password.password.label') }}</span>
            <span class="block relative" x-data="{showPassword: false}">
                <input x-model.lazy="password" :type="showPassword ? 'text' : 'password'" class="mt-2" required type="password" name="password" placeholder="{{ __('auth.reset_password.password.placeholder') }}">
                <span @click="showPassword = !showPassword" :class="showPassword ? 'show-password' : 'hide-password'" class="absolute z-[1] inset-y-1 right-1 bg-color-eff0f0 bg-no-repeat bg-center aspect-square rounded-sm cursor-pointer"></span>
            </span>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </label>

        <label class="block my-7">
            <span class="text-xs">{{ __('auth.reset_password.password_confirmation.label') }}</span>
            <span class="block relative" x-data="{showPassword: false}">
                <input x-model.lazy="passwordConfirmation" :type="showPassword ? 'text' : 'password'" class="mt-2" required type="password" name="password_confirmation" placeholder="{{ __('auth.reset_password.password_confirmation.placeholder') }}">
                <span @click="showPassword = !showPassword" :class="showPassword ? 'show-password' : 'hide-password'" class="absolute z-[1] inset-y-1 right-1 bg-color-eff0f0 bg-no-repeat bg-center aspect-square rounded-sm cursor-pointer"></span>
            </span>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            <template x-if="error">
                <span class="block mt-2 text-red-500 text-xs">Le password non coincidono</div>
            </template>
        </label>

        <button x-bind:disabled="submitDisabled" type="submit" class="block py-3.5 px-7 w-full bg-color-18181a text-white text-xs text-center font-medium rounded disabled:cursor-not-allowed disabled:opacity-75">{{ __('auth.reset_password.submit') }}</button>
        
    </form>
@endsection

