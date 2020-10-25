<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Auth User
Auth::routes();
Route::get('/test/not', function () {
    \Illuminate\Support\Facades\Notification::send(\App\Models\User::first(), new \App\Notifications\Test());
});
// User
Route::group(['as' => 'user.', 'namespace' => 'User', 'middleware' => ['auth', 'active']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
});
Route::get('/unactivated', function () {
    return view('auth.not_active');
})->name('user.not_active');

// Auth Employee
Route::group(['prefix' => 'emp', 'as' => 'employee.', 'namespace' => 'Auth'], function () {
    Route::get('login', 'EmployeeLoginController@showLoginForm')->name('login');
    Route::post('login', 'EmployeeLoginController@login')->name('login_post');
});

// Admin
Route::group(
    ['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth:employee']],
    function () {
        Route::get('/', 'AdminController@index')->name('home');
        // Permissions
        Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
        Route::resource('permissions', 'PermissionsController');

        // Roles
        Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
        Route::resource('roles', 'RolesController');

        // Users
        Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
        Route::get('users/unactivated', 'UsersController@unactive_users')->name('users.unactivated');
        Route::get('users/activate/{id}', 'UsersController@activated')->name('users.activated');
        Route::resource('users', 'UsersController');

        // Employees
        Route::delete('employees/destroy', 'EmployeesController@massDestroy')->name('employees.massDestroy');
        Route::resource('employees', 'EmployeesController');

        // Provinces
        Route::delete('provinces/destroy', 'ProvincesController@massDestroy')->name('provinces.massDestroy');
        Route::resource('provinces', 'ProvincesController');

        // Governors
        Route::delete('governors/destroy', 'GovernorsController@massDestroy')->name('governors.massDestroy');
        Route::resource('governors', 'GovernorsController');

        // Departments
        Route::delete('departments/destroy', 'DepartmentsController@massDestroy')->name('departments.massDestroy');
        Route::resource('departments', 'DepartmentsController');

        // Directorates
        Route::delete('directorates/destroy', 'DirectoratesController@massDestroy')->name('directorates.massDestroy');
        Route::resource('directorates', 'DirectoratesController');

        // Offices
        Route::delete('offices/destroy', 'OfficesController@massDestroy')->name('offices.massDestroy');
        Route::resource('offices', 'OfficesController');

        // Governor Agents
        Route::delete('governor-agents/destroy', 'GovernorAgentsController@massDestroy')
            ->name('governor-agents.massDestroy');
        Route::resource('governor-agents', 'GovernorAgentsController');

        // General Managers
        Route::delete('general-managers/destroy', 'GeneralManagersController@massDestroy')
            ->name('general-managers.massDestroy');
        Route::resource('general-managers', 'GeneralManagersController');

        // User Alerts
        Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
        Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

        // Projects Tables
        Route::delete('projects/destroy', 'ProjectController@massDestroy')
            ->name('projects.massDestroy');
        Route::get('projects/acceptable', 'ProjectController@acceptable')->name('projects.acceptable');
        Route::get('projects/activate/{id}', 'ProjectController@accepted')->name('projects.accepted');
        Route::resource('projects', 'ProjectController');

        // Project Types
        Route::delete('project-types/destroy', 'ProjectTypesController@massDestroy')->name('project-types.massDestroy');
        Route::resource('project-types', 'ProjectTypesController');

        // Project Natures
        Route::delete('project-natures/destroy', 'ProjectNaturesController@massDestroy')
            ->name('project-natures.massDestroy');
        Route::resource('project-natures', 'ProjectNaturesController');

        // Financial Years
        Route::delete('financial-years/destroy', 'FinancialYearsController@massDestroy')
            ->name('financial-years.massDestroy');
        Route::resource('financial-years', 'FinancialYearsController');

        // Budgets
        Route::delete('budgets/destroy', 'BudgetController@massDestroy')->name('budgets.massDestroy');
        Route::resource('budgets', 'BudgetController');

        // Tenders
        Route::get('tenders/ad/{id}', 'TenderController@announcement')->name('tenders.ad');
        Route::delete('tenders/destroy', 'TenderController@massDestroy')->name('tenders.massDestroy');
        Route::resource('tenders', 'TenderController');

        // Quantities
        Route::delete('quantities/destroy', 'TenderController@massDestroy')->name('quantities.massDestroy');
        Route::resource('quantities', 'TenderController');

        // Required Docs
        Route::delete('required-docs/destroy', 'RequiredDocController@massDestroy')->name('required-docs.massDestroy');
        Route::resource('required-docs', 'RequiredDocController');

        // Units
        Route::delete('units/destroy', 'UnitController@massDestroy')->name('units.massDestroy');
        Route::resource('units', 'UnitController');

        // Committees
        Route::delete('committees/destroy', 'CommitteeController@massDestroy')->name('committees.massDestroy');
        Route::resource('committees', 'CommitteeController');

        // Committee Members
        Route::delete('committee-members/destroy', 'CommitteeMemberController@massDestroy')
            ->name('committee-members.massDestroy');
        Route::resource('committee-members', 'CommitteeMemberController');

        Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');
        Route::get('messenger', 'MessengerController@index')->name('messenger.index');
        Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
        Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
        Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
        Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
        Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
        Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
        Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
        Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');
    }
);

Route::group(
    ['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']],
    function () {
        // Change password
        if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
            Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
            Route::post('password', 'ChangePasswordController@update')->name('password.update');
        }
    }
);
