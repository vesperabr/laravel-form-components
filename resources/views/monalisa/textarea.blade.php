<div class="form-item">
    <x-label class="{{ $hasError($name) ? '_error' : '' }}" for="{{ $id }}" :required="$required">{{ $label }}</x-label>
    <textarea
        name="{{ $name }}"
        id="{{ $id }}"
        {{ $attributes->merge(['class' => $hasError($name) ? '_error' : '']) }}
        {{ $required ? 'required' : '' }}
    >{!! $value !!}</textarea>
    {{ $slot }}
</div>
