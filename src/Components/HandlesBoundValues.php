<?php

namespace Vespera\LaravelFormComponents\Components;

use Illuminate\Database\Eloquent\Collection;
use Vespera\LaravelFormComponents\FormDataBinder;

trait HandlesBoundValues
{
    /**
     * Get the latest bound target.
     *
     * @return mixed
     */
    private function getBoundTarget()
    {
        return app(FormDataBinder::class)->get();
    }

    /**
     * Get an item from the latest bound target.
     *
     * @param mixed $bind
     * @param string $name
     * @return mixed
     */
    private function getBoundValue($bind = null, string $name)
    {
        if ($bind === false) {
            return null;
        }

        $bind = $bind ?: $this->getBoundTarget();
        $boundValue = data_get($bind, $name);

        if ($boundValue instanceof Collection) {

            $boundValue = $boundValue->modelKeys();
        }

        return $boundValue;
    }
}
