<?php

return [
    'accepted'                       => 'يجب قبول  :attribute.',
    'active_url'                     => 'هذا  :attribute  ليس رابط صالحا.',
    'after'                          => 'يجب أن يكون :attribute تاريخا بعد :date.',
    'after_or_equal'                 => 'يجب أن يكون :attribute تاريخا بعد أو يساوي :date.',
    'alpha'                          => 'قد يحتوي :attribute على أحرف فقط.',
    'alpha_dash'                     => 'قد تحتوي ال :attribute  على أحرف وأرقام وشرطات فقط.',
    'alpha_num'                      => 'قد تحتوي ال :attribute  على أحرف وأرقام  فقط.',
    'latin'                          => 'The :attribute may only contain ISO basic Latin alphabet letters.',
    'latin_dash_space'               => 'The :attribute may only contain ISO basic Latin alphabet letters, numbers, dashes, hyphens and spaces.',
    'array'                          => ':attribute  يجب ان تكون مصفوفة',
    'before'                         => 'يجب أن يكون :attribute تاريخا قبل :date.',
    'before_or_equal'                => 'يجب أن يكون :attribute تاريخا قبل أو يساوي :date.',
    'between'                        => [
        'numeric' => 'يجب أن يكون :attribute بين  :min و  :max  .',
        'file'    => 'يجب أن يكون :attribute بين  :min و  :max  كيلو بايت.',
        'string'  => 'يجب أن يكون :attribute بين  :min و  :max  حرف.',
        'array'   => 'يجب أن يكون :attribute بين  :min و  :max  نوع.',
    ],
    'boolean'                        => 'يجب أن يكون :attribute صح او خطأ',
    'confirmed'                      => 'تأكيد :attribute لا يطابق.',
    'date'                           => ':attribute  ليست تاريخا صالحا.',
    'date_format'                    => ':attribute لايتطابق مع الصيغة :format.',
    'different'                      => 'يجب أن يختلف  :attribute عن :other.',
    'digits'                         => 'هذا :attribute يجب ان يكون :digits ارقام.',
    'digits_between'                 => 'هذايجب ان يكون بين :min و :max ارقام.',
    'dimensions'                     => 'هذه :attribute ذات ابعاد خاطئة.',
    'distinct'                       => 'هذا :attribute الحقل موجود مسبقا',
    'email'                          => 'هذا :attribute يجب ان يكون بريد الكتروني صالح',
    'exists'                         => 'الحقل المختار :attribute غير صالح',
    'file'                           => 'هذا :attribute يجب ان يكون ملف',
    'filled'                         => 'هذا :attribute الحقل مطلوب.',
    'gt'                             => [
        'numeric' => 'يجب أن يكون :attribute أكبر من :value  .',
        'file'    => 'يجب أن يكون :attribute أكبر من :value كيلوبايت.',
        'string'  => 'يجب أن يكون',
        'array'   => 'يجب أن يحتوي :attribute على أكثر من: value عناصر .',
    ],
    'gte'                            => [
        'numeric' => 'The :attribute must be greater than or equal :value.',
        'file'    => 'The :attribute must be greater than or equal :value kilobytes.',
        'string'  => 'The :attribute must be greater than or equal :value characters.',
        'array'   => 'The :attribute must have :value items or more.',
    ],
    'image'                          => 'ال :attribute يجب ان تكون صورة',
    'in'                             => 'قيمة  :attribute المختارة غير صالحة.',
    'in_array'                       => 'حقل :attribute غير موجود فى :other.',
    'integer'                        => 'حقل :attribute يجب ان يكون رقم.',
    'ip'                             => ':attribute يجب ان يكون عنوان IP صالح.',
    'ipv4'                           => 'The :attribute must be a valid IPv4 address.',
    'ipv6'                           => 'The :attribute must be a valid IPv6 address.',
    'json'                           => ':attribute  يجب ان يكون في صيغة  JSON.',
    'lt'                             => [
        'numeric' => 'The :attribute must be less than :value.',
        'file'    => 'The :attribute must be less than :value kilobytes.',
        'string'  => 'The :attribute must be less than :value characters.',
        'array'   => 'The :attribute must have less than :value items.',
    ],
    'lte'                            => [
        'numeric' => 'The :attribute must be less than or equal :value.',
        'file'    => 'The :attribute must be less than or equal :value kilobytes.',
        'string'  => 'The :attribute must be less than or equal :value characters.',
        'array'   => 'The :attribute must not have more than :value items.',
    ],
    'max'                            => [
        'numeric' => 'The :attribute may not be greater than :max.',
        'file'    => 'The :attribute may not be greater than :max kilobytes.',
        'string'  => 'The :attribute may not be greater than :max characters.',
        'array'   => 'The :attribute may not have more than :max items.',
    ],
    'mimes'                          => 'The :attribute must be a file of type: :values.',
    'mimetypes'                      => 'The :attribute must be a file of type: :values.',
    'min'                            => [
        'numeric' => 'The :attribute must be at least :min.',
        'file'    => 'The :attribute must be at least :min kilobytes.',
        'string'  => 'The :attribute must be at least :min characters.',
        'array'   => 'The :attribute must have at least :min items.',
    ],
    'not_in'                         => 'The selected :attribute is invalid.',
    'not_regex'                      => 'The :attribute format is invalid.',
    'numeric'                        => 'The :attribute must be a number.',
    'password'                       => 'كلمة مرور خاطئة',
    'present'                        => 'The :attribute field must be present.',
    'regex'                          => 'The :attribute format is invalid.',
    'required'                       => 'حقل :attribute مطلوب',
    'required_if'                    => 'The :attribute field is required when :other is :value.',
    'required_unless'                => 'The :attribute field is required unless :other is in :values.',
    'required_with'                  => 'The :attribute field is required when :values is present.',
    'required_with_all'              => 'The :attribute field is required when :values is present.',
    'required_without'               => 'The :attribute field is required when :values is not present.',
    'required_without_all'           => 'The :attribute field is required when none of :values are present.',
    'same'                           => 'The :attribute and :other must match.',
    'size'                           => [
        'numeric' => 'The :attribute must be :size.',
        'file'    => 'The :attribute must be :size kilobytes.',
        'string'  => 'The :attribute must be :size characters.',
        'array'   => 'The :attribute must contain :size items.',
    ],
    'string'                         => ':attribute يجب ان يكون احرف',
    'timezone'                       => 'The :attribute must be a valid zone.',
    'unique'                         => ':attribute مأخوذ من قبل',
    'uploaded'                       => 'فشل التحميل :attribute .',
    'url'                            => ':attribute نوعة غير صحيح',
    'custom'                         => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],
    'reserved_word'                  => 'The :attribute contains reserved word',
    'dont_allow_first_letter_number' => 'حقل الادخال \":input\" لايمكن ان يكون اول خانة رقم',
    'exceeds_maximum_number'         => 'ال :attribute وصل الحد الاقصى للمودل',
    'db_column'                      => 'ال :attribute يمكن ان يحتوى فقط على ترميز الايزو للاحراف اللاتينية وارقام وعلامة الداش ولايمكن ان يبدأ برقم',
    'attributes'                     => [
        'name' => 'الاسم',
        'phone' => 'الهاتف',
        'province_id' => 'المحافظة',
        'manager_id' => 'المدير',
        'password' => 'كلمة السر',
    ],
];
