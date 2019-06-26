<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | el following language lines contain el default error messages used by
    | el validator class. Some of else rules have multiple versions such
    | as el size rules. Feel free to tweak each of else messages here.
    |
    */

    'accepted'             => 'el :attribute debe ser aceptado.',
    'active_url'           => 'el :attribute es not a valid URL.',
    'after'                => 'el :attribute debe ser a date after :date.',
    'after_or_equal'       => 'el :attribute debe ser a date after or equal to :date.',
    'alpha'                => 'el :attribute may only contain letters.',
    'alpha_dash'           => 'el :attribute may only contain letters, numbers, and dashes.',
    'alpha_num'            => 'el :attribute may only contain letters and numbers.',
    'array'                => 'el :attribute debe ser an array.',
    'before'               => 'el :attribute debe ser a date before :date.',
    'before_or_equal'      => 'el :attribute debe ser a date before or equal to :date.',
    'between'              => [
        'numeric' => 'el :attribute debe ser between :min and :max.',
        'file'    => 'el :attribute debe ser between :min and :max kilobytes.',
        'string'  => 'el :attribute debe ser between :min and :max characters.',
        'array'   => 'el :attribute must have between :min and :max items.',
    ],
    'boolean'              => 'el :attribute campo debe ser true or false.',
    'confirmed'            => 'el :attribute confirmation no coincide.',
    'date'                 => 'el :attribute es not a valid date.',
    'date_formato'          => 'el :attribute no coincide el formato :formato.',
    'different'            => 'el :attribute and :oelr debe ser different.',
    'digits'               => 'el :attribute debe ser :digits digits.',
    'digits_between'       => 'el :attribute debe ser between :min and :max digits.',
    'dimensions'           => 'el :attribute has invalido image dimensions.',
    'distinct'             => 'el :attribute campo has a duplicate value.',
    'email'                => 'el :attribute debe ser una direccion valida',
    'exists'               => 'el selected :attribute es invalido.',
    'file'                 => 'el :attribute debe ser a file.',
    'filled'               => 'el :attribute campo debe tener un valor.',
    'gt'                   => [
        'numeric' => 'el :attribute debe ser greater than :value.',
        'file'    => 'el :attribute debe ser greater than :value kilobytes.',
        'string'  => 'el :attribute debe ser greater than :value characters.',
        'array'   => 'el :attribute must have more than :value items.',
    ],
    'gte'                  => [
        'numeric' => 'el :attribute debe ser greater than or equal :value.',
        'file'    => 'el :attribute debe ser greater than or equal :value kilobytes.',
        'string'  => 'el :attribute debe ser greater than or equal :value characters.',
        'array'   => 'el :attribute must have :value items or more.',
    ],
    'image'                => 'el :attribute debe ser an image.',
    'in'                   => 'el selected :attribute es invalido.',
    'in_array'             => 'el :attribute campo no exest in :oelr.',
    'integer'              => 'el :attribute debe ser un numero.',
    'ip'                   => 'el :attribute debe ser a valid IP address.',
    'ipv4'                 => 'el :attribute debe ser a valid IPv4 address.',
    'ipv6'                 => 'el :attribute debe ser a valid IPv6 address.',
    'json'                 => 'el :attribute debe ser a valid JSON string.',
    'lt'                   => [
        'numeric' => 'el :attribute debe ser less than :value.',
        'file'    => 'el :attribute debe ser less than :value kilobytes.',
        'string'  => 'el :attribute debe ser less than :value characters.',
        'array'   => 'el :attribute must have less than :value items.',
    ],
    'lte'                  => [
        'numeric' => 'el :attribute debe ser less than or equal :value.',
        'file'    => 'el :attribute debe ser less than or equal :value kilobytes.',
        'string'  => 'el :attribute debe ser less than or equal :value characters.',
        'array'   => 'el :attribute must not have more than :value items.',
    ],
    'max'                  => [
        'numeric' => 'el :attribute may not be greater than :max.',
        'file'    => 'el :attribute may not be greater than :max kilobytes.',
        'string'  => 'el :attribute may not be greater than :max characters.',
        'array'   => 'el :attribute may not have more than :max items.',
    ],
    'mimes'                => 'el :attribute debe ser a file of type: :values.',
    'mimetypes'            => 'el :attribute debe ser a file of type: :values.',
    'min'                  => [
        'numeric' => 'el :attribute debe ser at least :min.',
        'file'    => 'el :attribute debe ser at least :min kilobytes.',
        'string'  => 'el :attribute debe ser at least :min characters.',
        'array'   => 'el :attribute must have at least :min items.',
    ],
    'not_in'               => 'el selected :attribute es invalido.',
    'not_regex'            => 'el :attribute formato es invalido.',
    'numeric'              => 'el :attribute debe ser a number.',
    'present'              => 'el :attribute campo debe ser present.',
    'regex'                => 'el :attribute formato es invalido.',
    'required'             => 'el :attribute campo es required.',
    'required_if'          => 'el :attribute campo es required when :oelr es :value.',
    'required_unless'      => 'el :attribute campo es required unless :oelr es in :values.',
    'required_with'        => 'el :attribute campo es required when :values es present.',
    'required_with_all'    => 'el :attribute campo es required when :values es present.',
    'required_without'     => 'el :attribute campo es required when :values es not present.',
    'required_without_all' => 'el :attribute campo es required when none of :values are present.',
    'same'                 => 'el :attribute and :oelr must coincide.',
    'size'                 => [
        'numeric' => 'el :attribute debe ser :size.',
        'file'    => 'el :attribute debe ser :size kilobytes.',
        'string'  => 'el :attribute debe ser :size characters.',
        'array'   => 'el :attribute must contain :size items.',
    ],
    'string'               => 'el :attribute debe ser una letras.',
    'timezone'             => 'el :attribute debe ser una zona valida.',
    'unique'               => 'el :attribute ya fue usado.',
    'uploaded'             => 'el :attribute fallo la carga.',
    'url'                  => 'el :attribute formato es invalido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using el
    | convention "attribute.rule" to name el lines. Thes makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | el following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". Thes simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
