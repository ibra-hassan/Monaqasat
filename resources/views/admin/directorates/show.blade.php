@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.directorate.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.directorates.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.directorate.fields.id') }}
                        </th>
                        <td>
                            {{ $directorate->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.directorate.fields.name') }}
                        </th>
                        <td>
                            {{ $directorate->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.directorate.fields.phone') }}
                        </th>
                        <td>
                            {{ $directorate->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.directorate.fields.province') }}
                        </th>
                        <td>
                            {{ $directorate->province->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.directorates.index') }}">
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
            <a class="nav-link" href="#directorate_offices" role="tab" data-toggle="tab">
                {{ trans('cruds.office.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="directorate_offices">
            @includeIf('admin.directorates.relationships.directorateOffices', ['offices' => $directorate->directorateOffices])
        </div>
    </div>
</div>

@endsection