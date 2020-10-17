<div class="form-item">
    <x-label class="{{ $hasError($name) ? '_error' : '' }}" for="{{ $id }}" :required="$required">{{ $label }}</x-label>
    <div>
        <select
            name="{{ $name }}"
            id="{{ $id }}"
            {{ $attributes->merge(['class' => $hasError($name) ? '_error' : '']) }}
            {{ $required ? 'required' : '' }}
            {{ $multiple ? 'multiple' : '' }}
        >
            @unless($multiple)
                <option value="">Selecione...</option>
            @endunless

            @foreach($options as $key => $option)
                <option
                    value="{{ $key }}"
                    {{ $isSelected($key) ? 'selected' : '' }}
                >
                    {{ $option }}
                </option>
            @endforeach
        </select>
        {{ $slot }}
    </div>
</div>
