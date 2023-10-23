@props(['by' => 'created_at|=', 'mode' => 'single', 'action' => false, 'append' => false, 'prepend' => false])
<div>
    <div
        wire:ignore
        x-data="{
				value: @entangle($attributes->wire('model')),
				init() {
				    let picker = flatpickr(this.$refs.picker, {
				        locale: '{{ app()->getLocale()}}',
				        mode: '{{$mode}}',
				        dateFormat: 'd-m-Y',
				        defaultDate: this.value,
				        onChange: (date, dateString) => {
				            this.value = dateString.split(' al ')
				            this.column = '{{ $by }}'.split('|')[0]
				            this.operator = '{{ $mode }}' === 'single' ? '{{ $by }}'.split('|')[1] : null
				            Livewire.dispatch('date_changed', {mode: '{{ $mode }}', column: this.column, operator: this.operator, value: this.value})
				        }
				    })

{{--				    this.$watch('value', () => picker.setDate(this.value))--}}
				},
			}"
        class="min-w-max w-full">
        <x-input type="text" x-ref="picker" {{ $attributes->merge() }}>
            @if($action)
                <x-slot:action>{{$action}}</x-slot:action>
            @endif
            @if($append)
                <x-slot:append>{{$append}}</x-slot:append>
            @endif
            @if($prepend)
                <x-slot:prepend>{{$prepend}}</x-slot:prepend>
            @endif
        </x-input>
        {{--		<x-input-error for="{{ $for }}" class="mt-1"/>--}}
    </div>
</div>
