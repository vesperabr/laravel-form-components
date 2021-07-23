<?php

namespace Vespera\LaravelFormComponents\Components;

use Vespera\LaravelFormComponents\Traits\HandlesDefaultAndOldValue;
use Vespera\LaravelFormComponents\Traits\HandlesValidationErrors;

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
        $bind = null,
        $value = null
    ) {
        $this->type = $type;
        $this->name = $name;
        $this->id = $id ?: $name;
        $this->label = $label;
        $this->prepend = $prepend;
        $this->append = $append;
        $this->required = $required;
        $this->showErrors = $showErrors;

        $bind = $type === 'password' ? false : $bind;
        $this->setValue($name, $bind, $value);
    }
}
