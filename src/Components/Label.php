<?php

namespace Vespera\LaravelFormComponents\Components;

class Label extends Component
{
    public $required;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(bool $required = false)
    {
        $this->required = $required;
    }
}
