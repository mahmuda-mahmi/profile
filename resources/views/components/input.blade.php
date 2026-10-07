@props([
    'name', 
    'label', 
    'type' => 'text', 
    'value' => null, 
    'attrs' => []
    ])

@php
    $finalValue = old($name, $value ?? '');
    $hasError = $errors->has($name);
@endphp

@if ($label)
    <label class="label" for="{{ $name }}">{{ $label }}</label>
@endif

<input
    type="{{ $type }}"
    name="{{ $name }}"
    id="{{ $name }}"
    value="{{ old($name, $value) }}"
    {{ $attributes->merge(['class' => 'input' . ($errors->has($name) ? ' input-error' : '')]) }}
/>
@error($name)
    <p class="text-error text-sm mt-1">{{ $message }}</p>
@enderror