@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => ' border-red-400 rounded-md  shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50"']) !!}>
