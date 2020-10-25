@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.governor.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.governors.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.governor.fields.id') }}
                        </th>
                        <td>
                            {{ $governor->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.governor.fields.name') }}
                        </th>
                        <td>
                            {{ $governor->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.governor.fields.phone') }}
                        </th>
                        <td>
                            {{ $governor->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.governor.fields.province') }}
                        </th>
                        <td>
                            {{ $governor->province->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.governors.index') }}">
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
            <a class="nav-link" href="#governor_governor_agents" role="tab" data-toggle="tab">
                {{ trans('cruds.governorAgent.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="governor_governor_agents">
            @includeIf('admin.governors.relationships.governorGovernorAgents', ['governorAgents' => $governor->governorGovernorAgents])
        </div>
    </div>
</div>

@endsection