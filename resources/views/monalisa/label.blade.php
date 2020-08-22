@if(! $slot->isEmpty())
    <label {{ $attributes }}>
        {{ $required ? "$slot*" : $slot }}
    </label>
@endif
