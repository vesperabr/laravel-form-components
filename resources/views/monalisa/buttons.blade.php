<div class="form-buttons">
    <div>
        <button
            class="Button"
            type="Submit"
            {!! $loader ? 'data-component="onsend"' : '' !!}
            {!! $loaderText ? 'data-text="'.$loaderText.'"' : '' !!}
        >
            {{ $submit }}
        </button>
        @if($cancelUrl)
            <a class="_muted" href="{{ $cancelUrl }}">Cancelar</a>
        @endif
    </div>
</div>
