<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'Значение поля :attribute должно быть отмеченои принято.',
    'active_url'           => 'Значение поля :attribute должно быть действительным URL.',
    'after'                => 'Значение поля :attribute должно быть датой после даты :date.',
    'after_or_equal'       => 'Значение поля :attribute должно быть датой после и такой же как :date.',
    'alpha'                => 'Значение поля :attribute должно содержать только буквы.',
    'alpha_dash'           => 'Значение поля :attribute должно содержать только буквы, цифры и симолы подчеркивания.',
    'alpha_num'            => 'Значение поля :attribute должно содержать только буквы и цифры.',
    'array'                => 'Значение поля :attribute должно быть массивом.',
    'before'               => 'Значение поля :attribute должно быть датой до даты :date.',
    'before_or_equal'      => 'Значение поля :attribute должно быть датой до и такой же как :date.',
    'between'              => [
        'numeric' => 'Значение поля :attribute должно находиться между :min и :max.',
        'file'    => 'Значение поля :attribute должно находиться между :min и :max килобайт.',
        'string'  => 'Значение поля :attribute должно находиться между :min and :max символов.',
        'array'   => 'Значение поля :attribute должно иметь от :min до :max элементов.',
    ],
    'boolean'              => 'Значение поля :attribute должно быть истиной или ложью.',
    'confirmed'            => 'Значение поля :attribute не подтверждено.',
    'date'                 => 'Значение поля :attribute не дата.',
    'date_format'          => 'Значение поля :attribute не подходит под формат даты :format.',
    'different'            => 'Значение поля :attribute и поля :other должны отличаться.',
    'digits'               => 'Значение поля :attribute должно быть числовым и иметь точную длину значения, равную :digits.',
    'digits_between'       => 'Значение поля :attribute должно быть числовым и иметь длину значения между :min и :max.',
    'dimensions'           => 'Значение поля :attribute имеет неверный размер изображения.',
    'distinct'             => 'Значение поля :attribute уже существует.',
    'email'                => 'Значение поля :attribute должно быть email адресом.',
    'exists'               => 'Выбраное значение поля :attribute не допустимо.',
    'file'                 => 'Загруженный объект :attribute должен быть файлом.',
    'filled'               => 'Значение поля :attribute должно быть выбрано.',
    'image'                => 'Загруженный объект :attribute должен быть изображением.',
    'in'                   => 'Выбранное значение поля :attribute недопустимо.',
    'in_array'             => 'Значение поля :attribute не содержится в :other.',
    'integer'              => 'Значение поля :attribute должно быть действительным числом.',
    'ip'                   => 'Значение поля :attribute должно быть IP адресом.',
    'ipv4'                 => 'Значение поля :attribute должно быть IPv4 адресом.',
    'ipv6'                 => 'Значение поля :attribute должно быть IPv6 адресом.',
    'json'                 => 'Значение поля :attribute должно быть JSON строкой.',
    'max'                  => [
        'numeric' => 'Значение поля :attribute не должно быть больше чем :max.',
        'file'    => 'Значение поля :attribute не должно быть больше чем :max килобайт.',
        'string'  => 'Значение поля :attribute не должно быть больше чем :max символов.',
        'array'   => 'Значение поля :attribute не должно содержать более :max элементов.',
    ],
    'mimes'                => 'Загруженный объект :attribute должен быть файлом с расширением: :values.',
    'mimetypes'            => 'The :attribute должен быть файлом с расширением: :values.',
    'min'                  => [
        'numeric' => 'Значение поля :attribute не должно быть меньше чем :min.',
        'file'    => 'Значение поля :attribute не должно быть меньше чем :min килобайт.',
        'string'  => 'Значение поля :attribute не должно быть меньше чем :min символов.',
        'array'   => 'Значение поля :attribute не должно содержать менее :min элементов.',
    ],
    'not_in'               => 'Выбранное значение поля :attribute недопустимо.',
    'numeric'              => 'Значение поля :attribute должно быть числом.',
    'present'              => 'Поле :attribute должно присутствовать во вносимых данных, но его значение может быть пустым.',
    'regex'                => 'Формат значения поля :attribute недействителен.',
    'required'             => 'Значение поля :attribute является обязательным.',
    'required_if'          => 'Значение поля :attribute является обязательным, если значение поля :other равно :value.',
    'required_unless'      => 'Значение поля :attribute является обязательным, если значение поля :other не равно :values.',
    'required_with'        => 'Значение поля :attribute является обязательным, если значение поля :values присутствует.',
    'required_with_all'    => 'Значение поля :attribute является обязательным, если значения :values присутствуют.',
    'required_without'     => 'Значение поля :attribute является обязательным, если значения :values не присутствуют.',
    'required_without_all' => 'Значение поля :attribute является обязательным, если ни одно из значений :values не присутствуют.',
    'same'                 => 'Значение поля :attribute и :other должны совпадать.',
    'size'                 => [
        'numeric' => 'Значение поля :attribute должно быть :size.',
        'file'    => 'Значение поля :attribute должно быть :size килобайт.',
        'string'  => 'Значение поля :attribute должно быть :size символов.',
        'array'   => 'Значение поля :attribute должно содержать :size элементов.',
    ],
    'string'               => 'Значение поля :attribute должно быть строкой.',
    'timezone'             => 'Значение поля :attribute должно быть временной зоной.',
    'unique'               => 'Значение поля :attribute должно быть уникальным. Видимо оно уже кем-то используется.',
    'uploaded'             => 'Файл :attribute не может быть загружен.',
    'url'                  => 'Значение поля :attribute не явлется url.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
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
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
