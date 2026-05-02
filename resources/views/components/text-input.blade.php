@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 bg-[#fff2cc] focus:border-[#ff941d] focus:ring-[#ff941d] rounded-md shadow-sm']) }}>
