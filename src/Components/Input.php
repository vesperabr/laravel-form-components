<?php

namespace Vespera\LaravelFormComponents\Components;

class Input extends Component
{
    use HandlesValidationErrors;
    use HandlesDefaultAndOldValue;

    public $label;
    public $type;
    public $name;
    public $id;
    public $prepend;
    public $append;
    public $required;
    public $value;
    public $showErrors;
    public $masked;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        string $label = '',
        string $type = 'text',
        string $name = '',
        string $id = '',
        string $prepend = '',
        string $append = '',
        bool $required = false,
        bool $showErrors = false,
        bool $masked = true,
        $bind = null,
        $value = null
    )
    {
        $this->type = $type;
        $this->name = $name;
        $this->id = $id ?: $name;
        $this->label = $label;
        $this->prepend = $prepend;
        $this->append = $append;
        $this->required = $required;
        $this->showErrors = $showErrors;
        $this->masked = $masked;

        $bind = $type === 'password' ? false : $bind;
        $this->setValue($name, $bind, $value);
    }
}
