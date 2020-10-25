@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.directorate.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.directorates.store") }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="name">{{ trans('cruds.directorate.fields.name') }}</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
                           id="name" value="{{ old('name', '') }}" required>
                    @if($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.directorate.fields.name_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="phone">{{ trans('cruds.directorate.fields.phone') }}</label>
                    <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone"
                           id="phone" value="{{ old('phone', '') }}" required>
                    @if($errors->has('phone'))
                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.directorate.fields.phone_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="province_id">{{ trans('cruds.directorate.fields.province') }}</label>
                    <select class="form-control select2 {{ $errors->has('province') ? 'is-invalid' : '' }}"
                            name="province_id" id="province_id" required>
                        @foreach($provinces as $id => $province)
                            <option
                                value="{{ $id }}" {{ old('province_id') == $id ? 'selected' : '' }}>{{ $province }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('province'))
                        <span class="text-danger">{{ $errors->first('province') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.directorate.fields.province_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="manager_id">{{ trans('cruds.directorate.fields.manager') }}</label>
                    <select class="form-control select2 {{ $errors->has('manager') ? 'is-invalid' : '' }}"
                            name="manager_id" id="manager_id" required>
                        @foreach($managers as $id => $manager)
                            <option
                                value="{{ $id }}" {{ old('manager_id') == $id ? 'selected' : '' }}>{{ $manager }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('manager'))
                        <span class="text-danger">{{ $errors->first('manager') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.directorate.fields.manager_helper') }}</span>
                </div>
                @include('partials.save_form', ['slot' => 'directorate'])
            </form>
        </div>
    </div>



@endsection
