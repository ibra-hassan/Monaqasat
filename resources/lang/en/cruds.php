<?php

return [
    'userManagement'     => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission'         => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
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
        'title'          => 'Roles',
        'title_singular' => 'Role',
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
        'title'          => 'Users',
        'title_singular' => 'User',
        'activate_user'  => 'Activate Users',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => '',
            'name'                     => 'Name',
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
        'title'          => 'Employees',
        'title_singular' => 'Employee',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => '',
            'name'                     => 'Name',
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
    'generalInformation' => [
        'title'          => 'General Informations',
        'title_singular' => 'General Information',
    ],
    'province'           => [
        'title'          => 'Provinces',
        'title_singular' => 'Province',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'Name',
            'name_helper'       => '',
            'phone'             => 'Phone',
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
        'title'          => 'Governors',
        'title_singular' => 'Governor',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'Name',
            'name_helper'       => '',
            'phone'             => 'Phone',
            'phone_helper'      => '',
            'province'          => 'Province',
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
        'title'          => 'Departments',
        'title_singular' => 'Department',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'Name',
            'name_helper'       => '',
            'phone'             => 'Phone',
            'phone_helper'      => '',
            'province'          => 'Province',
            'province_helper'   => '',
            'manager'           => 'Manager',
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
        'title'          => 'Directorates',
        'title_singular' => 'Directorate',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'Name',
            'name_helper'       => '',
            'phone'             => 'Phone',
            'phone_helper'      => '',
            'province'          => 'Province',
            'province_helper'   => '',
            'manager'           => 'Manager',
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
        'title'          => 'Offices',
        'title_singular' => 'Office',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'name'               => 'Name',
            'name_helper'        => '',
            'phone'              => 'Phone',
            'phone_helper'       => '',
            'directorate'        => 'Directorate',
            'directorate_helper' => '',
            'manager'            => 'Manager',
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
        'title'          => 'Governor Agents',
        'title_singular' => 'Governor Agent',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'Name',
            'name_helper'       => '',
            'phone'             => 'Phone',
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
        'title'          => 'General Managers',
        'title_singular' => 'General Manager',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'Name',
            'name_helper'       => '',
            'phone'             => 'Phone',
            'phone_helper'      => '',
            'manage_of'         => 'Manage of',
            'manager_of_helper' => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'userAlert'          => [
        'title'          => 'User Alerts',
        'title_singular' => 'User Alert',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'alert_text'        => 'Alert Text',
            'alert_text_helper' => ' ',
            'alert_link'        => 'Alert Link',
            'alert_link_helper' => ' ',
            'user'              => 'Users',
            'user_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
        ],
    ],
    'project'            => [
        'title'          => 'Projects',
        'title_singular' => 'Project',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'name'                  => 'Name',
            'name_helper'           => ' ',
            'file_path'             => 'File',
            'file_path_helper'      => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
            'target_number'         => 'Target Number',
            'target_number_helper'  => ' ',
            'description'           => 'Description',
            'description_helper'    => ' ',
            'start_date'            => 'Start Date',
            'start_date_helper'     => ' ',
            'estimated_year'        => 'Estimated Year',
            'estimated_year_helper' => ' ',
            'cost_primary'          => 'Cost Primary',
            'cost_primary_helper'   => ' ',
            'type'                  => 'Project Type',
            'type_helper'           => ' ',
            'nature'                => 'Project Nature',
            'nature_helper'         => ' ',
            'directorate'           => 'Location',
            'directorate_helper'    => ' ',
        ],
    ],
    'project_menu'       => [
        'title'          => 'Projects managers',
        'title_singular' => 'Project',
    ],
    'tender_menu'        => [
        'title'          => 'Tenders managers',
        'title_singular' => 'Tender',
    ],
    'projectType'        => [
        'title'          => 'Project Types',
        'title_singular' => 'Project Type',
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
        'title'          => 'Project Natures',
        'title_singular' => 'Project Nature',
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
        'title'          => 'Financial Years',
        'title_singular' => 'Financial Year',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'year'                => 'Year',
            'year_helper'         => ' ',
            'total_budget'        => 'Total Budget',
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
        'title'          => 'Budgets',
        'title_singular' => 'Budget',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'budget'            => 'Budget',
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
        'title'          => 'Tenders',
        'title_singular' => 'Tender',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'code'              => 'Code',
            'code_helper'       => ' ',
            'project'           => 'Project',
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
        'title'          => 'Required Documents',
        'title_singular' => 'Required Document',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
        ],
    ],
    'unit'               => [
        'title'          => 'Units',
        'title_singular' => 'Unit',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'symbol'             => 'Symbol',
            'symbol_helper'      => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
        ],
    ],
    'committee'          => [
        'title'          => 'Committees',
        'title_singular' => 'Committee',
        'fields'         => [
            'id'               => 'ID',
            'id_helper'        => ' ',
            'name'             => 'Name',
            'name_helper'      => ' ',
            'symbol'           => 'Symbol',
            'symbol_helper'    => ' ',
            'project'          => 'Project',
            'project_helper'   => ' ',
            'president'        => 'President',
            'president_helper' => ' ',
        ],
    ],
    'committee_member'   => [
        'title'          => 'Committee Members',
        'title_singular' => 'Committee Member',
        'fields'         => [
            'id'               => 'ID',
            'id_helper'        => ' ',
            'name'             => 'Name',
            'name_helper'      => ' ',
            'phone'            => 'Phone',
            'phone_helper'     => ' ',
            'committee'        => 'Committee',
            'committee_helper' => ' ',
        ],
    ],
];
