<?php

namespace Vespera\LaravelFormComponents\Traits;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ViewErrorBag;

trait HandlesValidationErrors
{
    /**
     * Returns a boolean wether the given attribute has an error.
     *
     * @param string $name
     * @param string $bag
     * @return boolean
     */
    public function hasError(string $name, string $bag = 'default')
    {
        $errors = View::shared('errors', function () {
            return request()->session()->get('errors', new ViewErrorBag());
        });

        $name = static::convertBracketsToDots($name);

        return $errors->getBag($bag)->has($name);
    }
}
