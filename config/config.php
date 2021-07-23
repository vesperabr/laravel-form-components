<?php

use Vespera\LaravelFormComponents\Components;

return [
    'components' => [
        'form' => [
            'class' => Components\Form::class,
            'view'  => 'form-components::form',
        ],

        'label' => [
            'class' => Components\Label::class,
            'view'  => 'form-components::label',
        ],

        'input' => [
            'class' => Components\Input::class,
            'view'  => 'form-components::input',
        ],

        'textarea' => [
            'class' => Components\Textarea::class,
            'view'  => 'form-components::textarea',
        ],

        'select' => [
            'class' => Components\Select::class,
            'view'  => 'form-components::select',
        ],

        'checkbox' => [
            'class' => Components\Checkbox::class,
            'view'  => 'form-components::checkbox',
        ],

        'checkboxes' => [
            'class' => Components\Checkboxes::class,
            'view'  => 'form-components::checkboxes',
        ],

        'radios' => [
            'class' => Components\Radios::class,
            'view'  => 'form-components::radios',
        ],

        'submit' => [
            'class' => Components\Submit::class,
            'view'  => 'form-components::submit',
        ],
    ]
];
