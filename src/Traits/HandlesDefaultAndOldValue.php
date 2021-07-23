<?php

namespace Vespera\LaravelFormComponents\Traits;

trait HandlesDefaultAndOldValue
{
    use HandlesBoundValues;

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
        $name = static::convertBracketsToDots($name);
        $default = $this->getBoundValue($bind, $name) ?: $default;
        return $this->value = old($name, $default);
    }
}
