<?php

namespace Vespera\LaravelFormComponents\Components;

class Buttons extends Component
{
    public $submit;
    public $cancelUrl;
    public $loader;
    public $loaderText;

    public function __construct(
        string $submit = 'Enviar',
        string $cancelUrl = '',
        $loader = false
    )
    {
        $this->submit = $submit;
        $this->cancelUrl = $cancelUrl;
        $this->loader = $loader;
        $this->loaderText = is_string($loader) ? $loader : '';
    }
}
