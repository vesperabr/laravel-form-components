<form
    method="{{ $method === 'GET' ? 'GET' : 'POST' }}"
    {{ $attributes->merge(['class' => $hasError() ? 'Form _with-error' : 'Form']) }}
>
    @unless(in_array($method, ['HEAD', 'GET', 'OPTIONS']))
        @csrf
    @endunless

    @unless(in_array($method, ['GET', 'POST']))
        @method($method)
    @endunless

    {{ $slot }}
</form>
