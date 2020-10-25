@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.governor.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.governors.store") }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="name">{{ trans('cruds.governor.fields.name') }}</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
                           id="name" value="{{ old('name', '') }}" required>
                    @if($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.governor.fields.name_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="phone">{{ trans('cruds.governor.fields.phone') }}</label>
                    <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone"
                           id="phone" value="{{ old('phone', '') }}" required>
                    @if($errors->has('phone'))
                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.governor.fields.phone_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="province_id">{{ trans('cruds.governor.fields.province') }}</label>
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
                    <span class="help-block">{{ trans('cruds.governor.fields.province_helper') }}</span>
                </div>
                @include('partials.save_form', ['slot' => 'governor'])
            </form>
        </div>
    </div>



@endsection
