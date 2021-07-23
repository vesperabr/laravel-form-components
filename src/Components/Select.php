<?php

namespace Vespera\LaravelFormComponents\Components;

use Vespera\LaravelFormComponents\Traits\HandlesDefaultAndOldValue;
use Vespera\LaravelFormComponents\Traits\HandlesValidationErrors;

class Select extends Component
{
    use HandlesValidationErrors;
    use HandlesDefaultAndOldValue;

    public $label;
    public $name;
    public $id;
    public $required;
    public $options;
    public $value;
    public $multiple;
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
        $options = [],
        bool $required = false,
        bool $multiple = false,
        bool $showErrors = false,
        $bind = null,
        $selected = null
    ) {
        $this->name = $name;
        $this->id = $id ?: $name;
        $this->label = $label;
        $this->options = $options;
        $this->required = $required;
        $this->multiple = $multiple;
        $this->showErrors = $showErrors;

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
