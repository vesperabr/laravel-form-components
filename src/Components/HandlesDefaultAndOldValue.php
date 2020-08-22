<?php

namespace Vespera\LaravelFormComponents\Components;

trait HandlesDefaultAndOldValue
{
    use HandlesBoundValues;
    use HandlesNameAttribute;

    /**
     * Set field value
     *
     * @param string $name
     * @param mixed $bind
     * @param mixed $default
     * @return void
     */
    private function setValue(string $name, $bind = null, $default = null)
    {
        $name = $this->toDotNotation($name);
        $default = $this->getBoundValue($bind, $name) ?: $default;
        return $this->value = old($name, $default);
    }
}
