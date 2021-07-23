<?php

namespace Vespera\LaravelFormComponents\Components;

use Illuminate\Support\Str;
use Illuminate\View\Component as BaseComponent;
use Vespera\LaravelFormComponents\FormDataBinder;

abstract class Component extends BaseComponent
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render()
    {
        $alias = Str::kebab(class_basename($this));
        return config("form-components.components.{$alias}.view");
    }

    protected static function convertBracketsToDots(string $name): string
    {
        $name = str_replace(['[', ']'], ['.', ''], $name);
        return rtrim($name, '.');
    }
}
