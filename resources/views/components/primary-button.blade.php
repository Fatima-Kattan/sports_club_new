@props(['disabled' => false])

<button {{ $disabled ? 'disabled' : '' }} 
        {{ $attributes->merge([
            'type' => 'submit',
            'class' => 'submit-btn'
        ]) }}>
    {{ $slot }}
</button>