<?php

return [
    'date_format'         => 'Y-m-d',
    'time_format'         => 'H:i:s',
    'primary_language'    => 'ar',
    'money'               => '$',
    'available_languages' => [
        'ar' => 'Arabic',
        'en' => 'English',
    ],

    // General Data
    'generalData'         => [
        'province', 'governor', 'governor_agent', 'department', 'directorate',
        'office',
    ],

    // Models
    'Models'              => [
        'permission', 'role', 'employee', 'user_alert', 'user', 'province', 'governor', 'governor_agent', 'department',
        'directorate', 'office', 'general_manager', 'financial_year', 'budget', 'project', 'project_type',
        'project_nature', 'tender', 'required_doc', 'unit', 'quantity', 'estimated_cost', 'quantity_item', 'cost_item',
        'committee', 'committee_member',
    ],
    // Permissions Models
    'permissionsModel'    => [
        '_create', '_edit', '_show', '_delete', '_access'
    ],
];
