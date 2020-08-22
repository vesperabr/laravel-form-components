<?php

namespace Vespera\LaravelFormComponents\Components;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ViewErrorBag;

trait HandlesValidationErrors
{
    use HandlesNameAttribute;

    /**
     * Returns a boolean wether the given attribute has an error.
     *
     * @param string $name
     * @param string $bag
     * @return boolean
     */
    public function hasError(string $name, string $bag = 'default')
    {
        $errors = View::shared('errors', function() {
            return request()->session()->get('errors', new ViewErrorBag);
        });

        $name = $this->toDotNotation($name);

        return $errors->getBag($bag)->has($name);
    }
}
