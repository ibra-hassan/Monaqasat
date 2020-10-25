@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.project.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.projects.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.id') }}
                        </th>
                        <td>
                            {{ $project->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.name') }}
                        </th>
                        <td>
                            {{ $project->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.target_number') }}
                        </th>
                        <td>
                            {{ $project->target_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.description') }}
                        </th>
                        <td>
                            {{ $project->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.start_date') }}
                        </th>
                        <td>
                            {{ $project->start_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.estimated_year') }}
                        </th>
                        <td>
                            {{ $project->estimated_year }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.cost_primary') }}
                        </th>
                        <td>
                            {{ $project->cost_primary }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.type') }}
                        </th>
                        <td>
                            {{ $project->type->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.nature') }}
                        </th>
                        <td>
                            {{ $project->nature->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.directorate') }}
                        </th>
                        <td>
                            {{ $project->location ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.file_path') }}
                        </th>
                        <td>
                            {{ asset('storage/'.$project->file_path) ?? '' }}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group d-flex justify-content-between">
                    <a class="btn btn-default" href="{{ route('admin.projects.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                    @can('accept_project')
                        <a class="btn btn-secondary"
                           href="{{ route('admin.projects.accepted', $project->id) }}">
                            {{ __('global.accept') }}
                        </a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection
