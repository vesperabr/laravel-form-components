<div class="form-item">
    <div>
        @if($default !== '')
            <input type="hidden" name="{{ $name }}" value="{{ $default }}">
        @endif
        <label>
            <input
                type="checkbox"
                name="{{ $name }}"
                id="{{ $id }}"
                value="{{ $value }}"
                {{ $checked ? 'checked' : '' }}
                {{ $required ? 'required' : '' }}
            >
            {{ $label }}
        </label>
    </div>
</div>
