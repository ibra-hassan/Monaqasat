@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.province.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.provinces.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.province.fields.id') }}
                        </th>
                        <td>
                            {{ $province->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.province.fields.name') }}
                        </th>
                        <td>
                            {{ $province->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.province.fields.phone') }}
                        </th>
                        <td>
                            {{ $province->phone }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.provinces.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#province_governor" role="tab" data-toggle="tab">
                {{ trans('cruds.governor.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#province_departments" role="tab" data-toggle="tab">
                {{ trans('cruds.department.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#province_directorates" role="tab" data-toggle="tab">
                {{ trans('cruds.directorate.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="province_governor">
            @includeIf('admin.provinces.relationships.provinceGovernor', ['governors' => $province->provinceGovernor])
        </div>
        <div class="tab-pane" role="tabpanel" id="province_departments">
            @includeIf('admin.provinces.relationships.provinceDepartments', ['departments' => $province->provinceDepartments])
        </div>
        <div class="tab-pane" role="tabpanel" id="province_directorates">
            @includeIf('admin.provinces.relationships.provinceDirectorates', ['directorates' => $province->provinceDirectorates])
        </div>
    </div>
</div>

@endsection