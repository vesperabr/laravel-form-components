<?php

use Vespera\LaravelFormComponents\Components;

return [
    'framework' => 'monalisa',

    'components' => [
        'form' => [
            'class' => Components\Form::class,
            'view'  => 'form-components::{framework}.form',
        ],

        'label' => [
            'class' => Components\Label::class,
            'view'  => 'form-components::{framework}.label',
        ],

        'input' => [
            'class' => Components\Input::class,
            'view'  => 'form-components::{framework}.input',
        ],

        'textarea' => [
            'class' => Components\Textarea::class,
            'view'  => 'form-components::{framework}.textarea',
        ],

        'select' => [
            'class' => Components\Select::class,
            'view'  => 'form-components::{framework}.select',
        ],

        'checkbox' => [
            'class' => Components\Checkbox::class,
            'view'  => 'form-components::{framework}.checkbox',
        ],

        'checkboxes' => [
            'class' => Components\Checkboxes::class,
            'view'  => 'form-components::{framework}.checkboxes',
        ],

        'radios' => [
            'class' => Components\Radios::class,
            'view'  => 'form-components::{framework}.radios',
        ],

        'buttons' => [
            'class' => Components\Buttons::class,
            'view'  => 'form-components::{framework}.buttons',
        ],
    ]
];
