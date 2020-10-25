@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.committee.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.committees.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.committee.fields.id') }}
                        </th>
                        <td>
                            {{ $committee->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.committee.fields.name') }}
                        </th>
                        <td>
                            {{ $committee->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.committee.fields.project') }}
                        </th>
                        <td>
                            {{ $committee->project->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.committee.fields.president') }}
                        </th>
                        <td>
                            {{ $committee->president ? $committee->president->name : '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            الاعضاء
                        </th>
                        <td>
                            @foreach($committee->members()->get() as $member)
                                <li>
                                    {{ $member->name }}
                                </li>
                            @endforeach
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.committees.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
