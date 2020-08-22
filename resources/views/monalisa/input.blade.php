<div class="{{ ($prepend || $append) ? 'form-group' : 'form-item' }}">
    <x-label class="{{ $hasError($name) ? '_error' : '' }}" for="{{ $id }}" :required="$required">{{ $label }}</x-label>
    <div>
        @empty(! $prepend)
            <div class="prepend">{{ $prepend }}</div>
        @endempty

        <input
            type="{{ in_array($type, ['float', 'money', 'cep', 'cnpj', 'cpf', 'cpfcnpj']) ? 'text' : $type }}"
            name="{{ $name }}"
            id="{{ $id }}"
            value="{{ $value }}"
            {{ $attributes->merge([
                'class' => $hasError($name) ? '_error' : '',
                'data-mask-name' => ($masked && in_array($type, ['float', 'money', 'cep', 'cnpj', 'cpf', 'cpfcnpj', 'tel'])) ? $type : ''
            ]) }}
            {{ $required ? 'required' : '' }}
        >

        @empty(! $append)
            <div class="append">{{ $append }}</div>
        @endempty
    </div>
</div>
