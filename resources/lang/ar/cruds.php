<?php

return [
    'userManagement'     => [
        'title'          => 'إدارة المستخدمين',
        'title_singular' => 'إدارة المستخدمين',
    ],
    'permission'         => [
        'title'          => 'الصلاحيات',
        'title_singular' => 'الصلاحية',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'title'             => 'Title',
            'title_helper'      => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'role'               => [
        'title'          => 'مجموعات',
        'title_singular' => 'مجموعة',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'title'              => 'Title',
            'title_helper'       => '',
            'permissions'        => 'Permissions',
            'permissions_helper' => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
    ],
    'user'               => [
        'title'          => 'المستخدمين',
        'title_singular' => 'مستخدم',
        'activate_user'  => 'تأكيد المستخدمين',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => '',
            'name'                     => 'الإسم',
            'name_helper'              => '',
            'email'                    => 'Email',
            'email_helper'             => '',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => '',
            'password'                 => 'Password',
            'password_helper'          => '',
            'roles'                    => 'Roles',
            'roles_helper'             => '',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => '',
            'created_at'               => 'Created at',
            'created_at_helper'        => '',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => '',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => '',
        ],
    ],
    'employee'           => [
        'title'          => 'الموظفين',
        'title_singular' => 'موظف',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => '',
            'name'                     => 'الإسم',
            'name_helper'              => '',
            'email'                    => 'الإيميل',
            'email_helper'             => '',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => '',
            'password'                 => 'كلمة السر',
            'password_helper'          => '',
            'roles'                    => 'Roles',
            'roles_helper'             => '',
            'remember_token'           => 'رمز التذكر',
            'remember_token_helper'    => '',
            'created_at'               => 'Created at',
            'created_at_helper'        => '',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => '',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => '',
        ],
    ],
    'generalInformation' => [
        'title'          => 'إدارة البيانات العامة',
        'title_singular' => 'إدارة البيانات العامة ',
    ],
    'province'           => [
        'title'          => 'المحافظات',
        'title_singular' => 'محافظة',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'الإسم',
            'name_helper'       => '',
            'phone'             => 'الهاتف',
            'phone_helper'      => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'governor'           => [
        'title'          => 'المحافظين',
        'title_singular' => 'محافظ',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'الإسم',
            'name_helper'       => '',
            'phone'             => 'الهاتف',
            'phone_helper'      => '',
            'province'          => 'المحافظة',
            'province_helper'   => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'department'         => [
        'title'          => 'الإدارات',
        'title_singular' => 'إدارة',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'الإسم',
            'name_helper'       => '',
            'phone'             => 'الهاتف',
            'phone_helper'      => '',
            'province'          => 'المحافظة',
            'province_helper'   => '',
            'manager'           => 'المدير العام',
            'manager_helper'    => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'directorate'        => [
        'title'          => 'المديريات',
        'title_singular' => 'مديرية',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'الإسم',
            'name_helper'       => '',
            'phone'             => 'الهاتف',
            'phone_helper'      => '',
            'province'          => 'المحافظة',
            'province_helper'   => '',
            'manager'           => 'المدير العام',
            'manager_helper'    => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'office'             => [
        'title'          => 'المكاتب',
        'title_singular' => 'مكتب',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'name'               => 'الإسم',
            'name_helper'        => '',
            'phone'              => 'الهاتف',
            'phone_helper'       => '',
            'directorate'        => 'Directorate',
            'directorate_helper' => '',
            'manager'            => 'المدير العام',
            'manager_helper'     => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
    ],
    'governorAgent'      => [
        'title'          => 'وكلاء المحافظين',
        'title_singular' => 'وكيل المحافظ',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'الإسم',
            'name_helper'       => '',
            'phone'             => 'الهاتف',
            'phone_helper'      => '',
            'governor'          => 'Governor',
            'governor_helper'   => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'generalManager'     => [
        'title'          => 'مدراء العموم',
        'title_singular' => 'مدير عام',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'الإسم',
            'name_helper'       => '',
            'phone'             => 'الهاتف',
            'phone_helper'      => '',
            'manage_of'         => 'مدير',
            'manager_of_helper' => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'project'            => [
        'title'          => 'المشاريع',
        'title_singular' => 'مشروع',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'name'                  => 'الإسم',
            'name_helper'           => '',
            'file_path'             => 'الملف',
            'file_path_helper'      => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
            'target_number'         => 'عدد المستهدفين',
            'target_number_helper'  => ' ',
            'description'           => 'الوصف',
            'description_helper'    => ' ',
            'start_date'            => 'تاريخ التنفيذ',
            'start_date_helper'     => ' ',
            'estimated_year'        => 'سنوات الإنجاز التقديرية',
            'estimated_year_helper' => ' ',
            'cost_primary'          => 'التكلفة الابتدائية',
            'cost_primary_helper'   => ' ',
            'type'                  => 'نوع المشروع',
            'type_helper'           => ' ',
            'nature'                => 'طبيعة المشروع',
            'nature_helper'         => ' ',
            'directorate'           => 'الموقع',
            'directorate_helper'    => ' ',
        ],
    ],
    'project_menu'       => [
        'title'          => 'إدارة المشاريع',
        'title_singular' => 'إدارة المشروع',
    ],
    'tender_menu'        => [
        'title'          => 'إدارة المناقصات',
        'title_singular' => 'إدارة المناقصة',
    ],
    'projectType'        => [
        'title'          => 'أنواع المشاريع',
        'title_singular' => 'نوع المشروع',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'projectNature'      => [
        'title'          => 'طبيعة المشاريع',
        'title_singular' => 'طبيعة المشروع',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'financialYear'      => [
        'title'          => 'السنوات المالية',
        'title_singular' => 'السنة المالية',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'year'                => 'السنة',
            'year_helper'         => ' ',
            'total_budget'        => 'كامل الميزانية',
            'total_budget_helper' => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
        ],
    ],
    'budget'             => [
        'title'          => 'الميزانية',
        'title_singular' => 'ميزانية',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'budget'            => 'المبلغ',
            'budget_helper'     => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'tender'             => [
        'title'          => 'مناقصات',
        'title_singular' => 'مناقصة',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'الاسم',
            'name_helper'       => ' ',
            'code'              => 'الرمز',
            'code_helper'       => ' ',
            'project'           => 'المشروع',
            'project_helper'    => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'required_doc'       => [
        'title'          => 'المستندات المطلوبة',
        'title_singular' => 'مستند مطلوب',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'المستند',
            'title_helper'       => ' ',
            'symbol'             => 'الرمز',
            'symbol_helper'      => ' ',
            'description'        => 'الوصف',
            'description_helper' => ' ',
        ],
    ],
    'unit'               => [
        'title'          => 'الوحدات',
        'title_singular' => 'وحدة',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'الوحدة',
            'title_helper'       => ' ',
            'description'        => 'الوصف',
            'description_helper' => ' ',
        ],
    ],
    'committee'          => [
        'title'          => 'اللجان',
        'title_singular' => 'لجنة',
        'fields'         => [
            'id'               => 'ID',
            'id_helper'        => ' ',
            'name'             => 'الاسم',
            'name_helper'      => ' ',
            'project'          => 'المشروع',
            'project_helper'   => ' ',
            'president'        => 'الرئيس',
            'president_helper' => ' ',
        ],
    ],
    'committee_member'   => [
        'title'          => 'اعضاء اللجان',
        'title_singular' => 'عضو لجنة',
        'fields'         => [
            'id'               => 'ID',
            'id_helper'        => ' ',
            'name'             => 'الاسم',
            'name_helper'      => ' ',
            'phone'            => 'الهاتف',
            'phone_helper'     => ' ',
            'committee'        => 'اللجنة',
            'committee_helper' => ' ',
        ],
    ],
];
