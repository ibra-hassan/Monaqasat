@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.governorAgent.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.governor-agents.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.governorAgent.fields.id') }}
                        </th>
                        <td>
                            {{ $governorAgent->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.governorAgent.fields.name') }}
                        </th>
                        <td>
                            {{ $governorAgent->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.governorAgent.fields.phone') }}
                        </th>
                        <td>
                            {{ $governorAgent->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.governorAgent.fields.governor') }}
                        </th>
                        <td>
                            {{ $governorAgent->governor->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.governor-agents.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection