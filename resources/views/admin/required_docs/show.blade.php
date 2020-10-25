@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.required_doc.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.required-docs.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.required_doc.fields.id') }}
                        </th>
                        <td>
                            {{ $required_doc->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.required_doc.fields.title') }}
                        </th>
                        <td>
                            {{ $required_doc->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.required_doc.fields.description') }}
                        </th>
                        <td>
                            {{ $required_doc->description }}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.required-docs.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
