<?php

namespace Vespera\LaravelFormComponents\Components;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ViewErrorBag;
use Vespera\LaravelFormComponents\FormDataBinder;

class Form extends Component
{
    public $method;
    public $bind;
    public $multipart;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $method = 'POST', $bind = null, $multipart = false)
    {
        $this->method = strtoupper(trim($method));
        $this->bind = $bind;
        $this->multipart = $multipart;
        app(FormDataBinder::class)->bind($bind);
    }

    /**
     * Returns a boolean wether the error bag is not empty.
     *
     * @param string $bag
     * @return boolean
     */
    public function hasError($bag = 'default')
    {
        $errors = View::shared('errors', function () {
            return request()->session()->get('errors', new ViewErrorBag());
        });

        return $errors->getBag($bag)->isNotEmpty();
    }
}
