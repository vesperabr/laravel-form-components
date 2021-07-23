<button {!! $attributes->merge([
    'class' => 'Button',
    'type' => 'submit',
]) !!}>
    {!! trim($slot) ?: __('Enviar') !!}
</button>
