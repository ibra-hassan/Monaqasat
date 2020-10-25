@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            قائمة المستخدمين لغير مفعلين
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if(count($rows) > 0)
                    <table class=" table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <th>
                                {{ __('cruds.user.fields.id') }}
                            </th>
                            <th>
                                {{ __('cruds.user.fields.email') }}
                            </th>
                            <th>
                                {{ __('cruds.user.fields.created_at') }}
                            </th>
                            <th>
                                تفعيل
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
                                    {{ $row->email ?? '' }}
                                </td>
                                <td>
                                    {{ $row->created_at ?? '' }}
                                </td>
                                <td>
                                    @can('activated_users')
                                        <a class="btn btn-xs btn-secondary"
                                           href="{{ route('admin.users.activated', $row->id) }}">
                                            {{ __('global.activate') }}
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
