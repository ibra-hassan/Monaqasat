@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.office.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.offices.update", [$office->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.office.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $office->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.office.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="phone">{{ trans('cruds.office.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', $office->phone) }}" required>
                @if($errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.office.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="directorate_id">{{ trans('cruds.office.fields.directorate') }}</label>
                <select class="form-control select2 {{ $errors->has('directorate') ? 'is-invalid' : '' }}" name="directorate_id" id="directorate_id" required>
                    @foreach($directorates as $id => $directorate)
                        <option value="{{ $id }}" {{ (old('directorate_id') ? old('directorate_id') : $office->directorate->id ?? '') == $id ? 'selected' : '' }}>{{ $directorate }}</option>
                    @endforeach
                </select>
                @if($errors->has('directorate'))
                    <span class="text-danger">{{ $errors->first('directorate') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.office.fields.directorate_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="manager_id">{{ trans('cruds.office.fields.manager') }}</label>
                <select class="form-control select2 {{ $errors->has('manager') ? 'is-invalid' : '' }}" name="manager_id" id="manager_id" required>
                    @foreach($managers as $id => $manager)
                        <option value="{{ $id }}" {{ (old('manager_id') ? old('manager_id') : $office->manager->id ?? '') == $id ? 'selected' : '' }}>{{ $manager }}</option>
                    @endforeach
                </select>
                @if($errors->has('manager'))
                    <span class="text-danger">{{ $errors->first('manager') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.office.fields.manager_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection