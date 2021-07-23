<?php

namespace Vespera\LaravelFormComponents\Components;

use Vespera\LaravelFormComponents\Traits\HandlesDefaultAndOldValue;
use Vespera\LaravelFormComponents\Traits\HandlesValidationErrors;

class Radios extends Component
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
    ) {
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

        return false;
    }
}
