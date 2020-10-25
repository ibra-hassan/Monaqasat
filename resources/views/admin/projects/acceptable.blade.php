@extends('layouts.admin')
@section('content')
    @if(session('error'))
        <div class="row mb-2">
            <div class="col-lg-12">
                <div class="alert alert-error" role="alert">{{ session('error') }}</div>
            </div>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            قائمة المشاريع لغير مقبولة
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if(count($rows) > 0)
                    <table class=" table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <th>
                                {{ __('cruds.project.fields.id') }}
                            </th>
                            <th>
                                {{ __('cruds.project.fields.name') }}
                            </th>
                            <th>
                                {{ __('cruds.project.fields.directorate') }}
                            </th>
                            <th>
                                {{ __('global.actions') }}
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($rows as $key => $row)
                            <tr>
                                <td>
                                    {{ $row->id ?? '' }}
                                </td>
                                <td>
                                    {{ $row->name ?? '' }}
                                </td>
                                <td>
                                    {{ $row->location ?? '' }}
                                </td>
                                <td>
                                    @can('project_show')
                                        <a class="btn btn-xs btn-primary"
                                           href="{{ route('admin.projects.show', $row->id) }}">
                                            {{ __('global.view') }}
                                        </a>
                                    @endcan
                                    @can('accept_project')
                                        <a class="btn btn-xs btn-secondary"
                                           href="{{ route('admin.projects.accepted', $row->id) }}">
                                            {{ __('global.accept') }}
                                        </a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <tr>
                        لا يوجد حسابات غير مفعلة
                    </tr>
                @endif
            </div>
        </div>
    </div>
@endsection
