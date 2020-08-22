<?php

namespace Vespera\LaravelFormComponents\Components;

class Textarea extends Component
{
    use HandlesValidationErrors;
    use HandlesDefaultAndOldValue;

    public $label;
    public $name;
    public $id;
    public $required;
    public $value;
    public $showErrors;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        string $label = '',
        string $name = '',
        string $id = '',
        bool $required = false,
        bool $showErrors = false,
        $bind = null,
        $value = null
    )
    {
        $this->name = $name;
        $this->id = $id ?: $name;
        $this->label = $label;
        $this->required = $required;
        $this->showErrors = $showErrors;

        $this->setValue($name, $bind, $value);
    }
}
