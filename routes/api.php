<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Provinces
    Route::apiResource('provinces', 'ProvincesApiController');

    // Governors
    Route::apiResource('governors', 'GovernorsApiController');

    // Departments
    Route::apiResource('departments', 'DepartmentsApiController');

    // Directorates
    Route::apiResource('directorates', 'DirectoratesApiController');

    // Offices
    Route::apiResource('offices', 'OfficesApiController');

    // Governor Agents
    Route::apiResource('governor-agents', 'GovernorAgentsApiController');

    // General Managers
    Route::apiResource('general-managers', 'GeneralManagersApiController');
});