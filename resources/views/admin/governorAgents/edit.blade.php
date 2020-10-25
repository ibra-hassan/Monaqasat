@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.governorAgent.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.governor-agents.update", [$governorAgent->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.governorAgent.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $governorAgent->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.governorAgent.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="phone">{{ trans('cruds.governorAgent.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', $governorAgent->phone) }}" required>
                @if($errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.governorAgent.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="governor_id">{{ trans('cruds.governorAgent.fields.governor') }}</label>
                <select class="form-control select2 {{ $errors->has('governor') ? 'is-invalid' : '' }}" name="governor_id" id="governor_id" required>
                    @foreach($governors as $id => $governor)
                        <option value="{{ $id }}" {{ (old('governor_id') ? old('governor_id') : $governorAgent->governor->id ?? '') == $id ? 'selected' : '' }}>{{ $governor }}</option>
                    @endforeach
                </select>
                @if($errors->has('governor'))
                    <span class="text-danger">{{ $errors->first('governor') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.governorAgent.fields.governor_helper') }}</span>
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