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
            {{ trans('global.create') }} {{ trans('cruds.committee_member.title_singular') }}
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route("admin.committee-members.store") }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required"
                           for="committee_id">{{ trans('cruds.committee_member.fields.committee') }}</label>
                    <select class="form-control select2 {{ $errors->has('committee') ? 'is-invalid' : '' }}"
                            name="committee_id" id="committee_id" required>
                        @foreach($committees as $id => $committee)
                            <option
                                value="{{ $id }}" {{ old('committee_id') == $id ? 'selected' : '' }}>{{ $committee }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('committee'))
                        <span class="text-danger">{{ $errors->first('committee') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.committee_member.fields.committee_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="name">{{ trans('cruds.committee_member.fields.name') }}</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
                           id="name" value="{{ old('name', '') }}" required>
                    @if($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.committee.fields.name_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="phone">{{ trans('cruds.committee_member.fields.phone') }}</label>
                    <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone"
                           id="phone" value="{{ old('phone', '') }}">
                    @if($errors->has('phone'))
                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.committee_member.fields.phone_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="president">{{ trans('cruds.committee.fields.president') }}</label>
                    <input class="form-control {{ $errors->has('president') ? 'is-invalid' : '' }}" type="checkbox"
                           name="president"
                           id="president">
                    @if($errors->has('president'))
                        <span class="text-danger">{{ $errors->first('president') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.committee.fields.president_helper') }}</span>
                </div>
                @include('partials.save_form', ['slot' => 'committee'])
            </form>
        </div>
    </div>
@endsection
