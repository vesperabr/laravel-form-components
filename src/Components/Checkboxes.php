<?php

namespace Vespera\LaravelFormComponents\Components;

class Checkboxes extends Component
{
    use HandlesValidationErrors;
    use HandlesDefaultAndOldValue;

    public $label;
    public $name;
    public $options;
    public $required;
    public $value;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        string $label = '',
        string $name = '',
        $options = [],
        bool $required = false,
        $bind = null,
        $selected = null
    )
    {
        $this->name = $name;
        $this->label = $label;
        $this->options = $options;
        $this->required = $required;

        $this->setValue($name, $bind, $selected);
    }

    public function isSelected($key)
    {
        if ($this->value == $key) {
            return true;
        }

        if (is_array($this->value) && in_array($key, $this->value)) {
            return true;
        }

        return false;
    }
}
