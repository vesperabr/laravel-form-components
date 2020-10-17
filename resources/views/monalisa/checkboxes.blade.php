<div class="form-item">
    <x-label class="{{ $hasError($name) ? '_error' : '' }}" :required="$required">{{ $label }}</x-label>
    <div>
        @foreach($options as $key => $option)
            <label>
                <input
                    type="checkbox"
                    name="{{ $name }}"
                    value="{{ $key }}"
                    {{ $isSelected($key) ? 'checked' : '' }}
                >
                {{ $option }}
            </label>
        @endforeach
        {{ $slot }}
    </div>
</div>
