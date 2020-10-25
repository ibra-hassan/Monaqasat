<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li>
                    <select class="searchable-field form-control">

                    </select>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("admin.home") }}">
                        <i class="fas fa-fw fa-tachometer-alt nav-icon">
                        </i>
                        <p>
                            {{ trans('global.dashboard') }}
                        </p>
                    </a>
                </li>
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/permissions*") ? "menu-open" : "" }} {{ request()->is("admin/roles*") ? "menu-open" : "" }} {{ (request()->is("admin/users*") && !request()->is("admin/users/unactivated")) ? "menu-open" : "" }} {{ request()->is("admin/employees*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p>
                                {{ trans('cruds.userManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}"
                                       class="nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.permission.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}"
                                       class="nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.role.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}"
                                       class="nav-link {{ request()->is("admin/users") || (request()->is("admin/users/*") && !request()->is("admin/users/unactivated"))? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.user.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('employee_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.employees.index") }}"
                                       class="nav-link {{ request()->is("admin/employees") || request()->is("admin/employees/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.employee.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('activated_users')
                    <li class="nav-item">
                        <a href="{{ route("admin.users.unactivated") }}"
                           class="nav-link {{ request()->is("admin/users/unactivated") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p>
                                {{ trans('cruds.user.activate_user') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('user_alert_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.user-alerts.index") }}"
                           class="nav-link {{ request()->is("admin/user-alerts") || request()->is("admin/user-alerts/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-bell">

                            </i>
                            <p>
                                {{ trans('cruds.userAlert.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('general_information_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/provinces*") ? "menu-open" : "" }} {{ request()->is("admin/governors*") ? "menu-open" : "" }} {{ request()->is("admin/departments*") ? "menu-open" : "" }} {{ request()->is("admin/directorates*") ? "menu-open" : "" }} {{ request()->is("admin/offices*") ? "menu-open" : "" }} {{ request()->is("admin/governor-agents*") ? "menu-open" : "" }} {{ request()->is("admin/general-managers*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-sitemap">

                            </i>
                            <p>
                                {{ trans('cruds.generalInformation.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('province_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.provinces.index") }}"
                                       class="nav-link {{ request()->is("admin/provinces") || request()->is("admin/provinces/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-indent">

                                        </i>
                                        <p>
                                            {{ trans('cruds.province.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('governor_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.governors.index") }}"
                                       class="nav-link {{ request()->is("admin/governors") || request()->is("admin/governors/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-indent">

                                        </i>
                                        <p>
                                            {{ trans('cruds.governor.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('department_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.departments.index") }}"
                                       class="nav-link {{ request()->is("admin/departments") || request()->is("admin/departments/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-indent">

                                        </i>
                                        <p>
                                            {{ trans('cruds.department.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('directorate_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.directorates.index") }}"
                                       class="nav-link {{ request()->is("admin/directorates") || request()->is("admin/directorates/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-indent">

                                        </i>
                                        <p>
                                            {{ trans('cruds.directorate.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('office_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.offices.index") }}"
                                       class="nav-link {{ request()->is("admin/offices") || request()->is("admin/offices/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-indent">

                                        </i>
                                        <p>
                                            {{ trans('cruds.office.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('governor_agent_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.governor-agents.index") }}"
                                       class="nav-link {{ request()->is("admin/governor-agents") || request()->is("admin/governor-agents/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-indent">

                                        </i>
                                        <p>
                                            {{ trans('cruds.governorAgent.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('general_manager_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.general-managers.index") }}"
                                       class="nav-link {{ request()->is("admin/general-managers") || request()->is("admin/general-managers/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-indent">

                                        </i>
                                        <p>
                                            {{ trans('cruds.generalManager.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('project_menu_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/projects*") ? "menu-open" : "" }} {{ request()->is("admin/project-types*") ? "menu-open" : "" }} {{ request()->is("admin/project-natures*") ? "menu-open" : "" }} {{ request()->is("admin/financial-years*") ? "menu-open" : "" }} {{ request()->is("admin/budgets*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fab fa-r-project">

                            </i>
                            <p>
                                {{ trans('cruds.project_menu.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('project_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.projects.index") }}"
                                       class="nav-link {{ request()->is("admin/projects") || (request()->is("admin/projects/*") && !request()->is("admin/projects/acceptable")) ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">
                                        </i>
                                        <p>
                                            {{ trans('cruds.project.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('project_type_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.project-types.index") }}"
                                       class="nav-link {{ request()->is("admin/project-types") || request()->is("admin/project-types/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-project-diagram">

                                        </i>
                                        <p>
                                            {{ trans('cruds.projectType.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('project_nature_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.project-natures.index") }}"
                                       class="nav-link {{ request()->is("admin/project-natures") || request()->is("admin/project-natures/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-project-diagram">

                                        </i>
                                        <p>
                                            {{ trans('cruds.projectNature.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('financial_year_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.financial-years.index") }}"
                                       class="nav-link {{ request()->is("admin/financial-years") || request()->is("admin/financial-years/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-money-check-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.financialYear.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('budget_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.budgets.index") }}"
                                       class="nav-link {{ request()->is("admin/budgets") || request()->is("admin/budgets/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-dollar-sign">

                                        </i>
                                        <p>
                                            {{ trans('cruds.budget.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('accept_project')
                                <li class="nav-item">
                                    <a href="{{ route("admin.projects.acceptable") }}"
                                       class="nav-link {{ request()->is("admin/projects/acceptable") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">
                                        </i>
                                        <p>
                                            الموافقة على المشاريع
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('tender_menu_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/tenders*") ? "menu-open" : "" }}{{ request()->is("admin/required-docs*") ? "menu-open" : "" }}{{ request()->is("admin/committees*") ? "menu-open" : "" }}{{ request()->is("admin/committee-members*") ? "menu-open" : "" }} ">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fab fa-r-project">

                            </i>
                            <p>
                                {{ trans('cruds.tender_menu.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('tender_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tenders.index") }}"
                                       class="nav-link {{ request()->is("admin/tenders") || request()->is("admin/tenders/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.tender.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('required_doc_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.required-docs.index") }}"
                                       class="nav-link {{ request()->is("admin/required-docs") || request()->is("admin/required-docs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.required_doc.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('committee_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.committees.index") }}"
                                       class="nav-link {{ request()->is("admin/committees") || request()->is("admin/committees/*") || request()->is("admin/committee-members") || request()->is("admin/committee-members/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-object-group">

                                        </i>
                                        <p>
                                            {{ trans('cruds.committee.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('unit_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.units.index") }}"
                           class="nav-link {{ request()->is("admin/units") || request()->is("admin/units/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-toolbox">

                            </i>
                            <p>
                                {{ trans('cruds.unit.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @php($unread = \App\Models\QaTopic::unreadCount())
                <li class="nav-item">
                    <a href="{{ route("admin.messenger.index") }}"
                       class="{{ request()->is("admin/messenger") || request()->is("admin/messenger/*") ? "active" : "" }} nav-link">
                        <i class="fa-fw fa fa-envelope nav-icon">

                        </i>
                        <p>{{ trans('global.messages') }}</p>
                        @if($unread > 0)
                            <strong>( {{ $unread }} )</strong>
                        @endif

                    </a>
                </li>
                @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                    @can('profile_password_edit')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}"
                               href="{{ route('profile.password.edit') }}">
                                <i class="fa-fw fas fa-key nav-icon">
                                </i>
                                <p>
                                    {{ trans('global.change_password') }}
                                </p>
                            </a>
                        </li>
                    @endcan
                @endif
                <li class="nav-item">
                    <a href="#" class="nav-link"
                       onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt nav-icon">

                            </i>
                        <p>{{ trans('global.logout') }}</p>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
