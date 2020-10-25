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
            {{ trans('global.edit') }} {{ trans('cruds.tender.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.tenders.update", [$tender->id]) }}"
                  enctype="multipart/form-data">
                @method('PUT')
                @include('admin.tenders.form')
            </form>
        </div>
    </div>



@endsection
