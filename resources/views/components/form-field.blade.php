@props(['field-name' => '', 'label' => ''])

<x-label for="{{ $fieldName }}" value="{{ $label }}" class="mt-3" />

<x-input {{ $attributes }}
    id="{{ $fieldName }}" 
    class="block mt-1 w-full"
    
    name="{{ $fieldName }}"
   
    required/>