<?php

namespace Vespera\LaravelFormComponents\Components;

trait HandlesNameAttribute
{
    /**
     * Transform a name attribute to dot notation
     *
     * @param string $name
     * @return string
     */
    private function toDotNotation(string $name)
    {
        $name = str_replace(['[', ']'], ['.', ''], $name);
        return rtrim($name, '.');
    }
}
