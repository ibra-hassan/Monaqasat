@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.committee_member.title') }}
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
                            {{ trans('cruds.committee_member.fields.id') }}
                        </th>
                        <td>
                            {{ $committee_member->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.committee_member.fields.name') }}
                        </th>
                        <td>
                            {{ $committee_member->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.committee_member.fields.phone') }}
                        </th>
                        <td>
                            {{ $committee_member->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.committee_member.fields.committee') }}
                        </th>
                        <td>
                            {{ $committee_member->committee->name }}
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
