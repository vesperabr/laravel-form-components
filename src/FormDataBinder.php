<?php

namespace Vespera\LaravelFormComponents;

use Illuminate\Support\Arr;

class FormDataBinder
{
    /**
     * Tree of bound targets.
     */
    private $bindings = [];

    /**
     * Bind a target to the current instance
     *
     * @param mixed $target
     * @return void
     */
    public function bind($target)
    {
        $this->bindings[] = $target;
    }

    /**
     * Get the latest bound target.
     *
     * @return mixed
     */
    public function get()
    {
        return Arr::last($this->bindings);
    }

    /**
     * Remove the last binding.
     *
     * @return void
     */
    public function pop()
    {
        array_pop($this->bindings);
    }
}
