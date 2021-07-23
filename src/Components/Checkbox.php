<?php

namespace Vespera\LaravelFormComponents\Components;

use Vespera\LaravelFormComponents\Traits\HandlesBoundValues;

class Checkbox extends Component
{
    use HandlesBoundValues;

    public $label;
    public $name;
    public $id;
    public $value;
    public $default;
    public $required;
    public $checked;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        string $label = '',
        string $name = '',
        string $id = '',
        string $default = '',
        bool $required = false,
        bool $checked = false,
        $bind = null,
        $value = null
    ) {
        $this->label = $label;
        $this->name = $name;
        $this->id = $id ?: $name;
        $this->value = $value;
        $this->default = $default;
        $this->required = $required;

        $this->checked = $this->isChecked($name, $bind, $checked);
    }

    private function isChecked(string $name, $bind = null, bool $checked = false)
    {
        $name = static::convertBracketsToDots($name);
        $boundValue = $this->getBoundValue($bind, $name);
        $oldValue = old($name);

        if ($oldValue !== null) {
            // Existe valor no old
            $checked = $this->value == $oldValue;
        } else {
            // Não existe valor no old e checked é false
            if ($boundValue !== null && $checked === false) {
                // Compara com o valor do bound
                $checked = $this->value == $boundValue;
            }
        }

        return $checked;
    }
}
