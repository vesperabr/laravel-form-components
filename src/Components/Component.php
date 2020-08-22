<?php

namespace Vespera\LaravelFormComponents\Components;

Use Illuminate\Support\Str;
Use Illuminate\View\Component as BaseComponent;
Use Vespera\LaravelFormComponents\FormDataBinder;

class Component extends BaseComponent
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render()
    {
        $alias = Str::kebab(class_basename($this));
        $config = config("form-components.components.{$alias}");
        $framework = config("form-components.framework");

        return str_replace('{framework}', $framework, $config['view']);
    }
}
