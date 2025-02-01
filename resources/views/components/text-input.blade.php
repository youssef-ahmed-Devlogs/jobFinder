@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => ' border-0 rounded-md shadow-sm bg-gray-100']) }}>
